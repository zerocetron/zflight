<?php
namespace zit\qcsoft;

use Flight;

/**
 * 晴川数据库操作类
 * 需要依赖Flight、Medoo，Flight不是必须的
 */
class QcMember{

	/**
	$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'xxx',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8'
	]);
	Flight::set('db', $database);
	 */
	protected $db; //local mysql

	/**
	$database2 = new medoo([
	'database_type' => 'mssql',
	'database_name' => 'xxxx',
	'server' => 'ip',
	'port' => 'port',
	'username' => 'xxxx',
	'password' => 'xxxx',
	'charset' => 'utf8'
	]);
	Flight::set('db2', $database2);
	 */
	protected $db2; //sqlserver

	function __construct() {
		$this->db = Flight::get('db');
		$this->db2 = Flight::get('db2');
	}

	//全量导入
	function syncAllMembers() {
		//禁用，使用sql导入 //insert select xxx
		//预先导入到mysql中，然后在同一数据库中关联导入微擎会员系统
		//sync_memberinfo , sync_cardinfo , sync_member_score_rec
		$tmpMembers = $this->db->select('memberinfo', '*', ['LIMIT'=>[0, 100]]);
		foreach($tmpMembers as $qcmember) {
			$lastSyncId = max($qcmember['init_date'], $lastSyncId); //必须根据init_date注册时间来排序
			$password = substr(md5(microtime()), rand(0, 24), 8);
			$salt = substr(md5(microtime()), rand(0, 24), 8);
			$data = array(
				'uniacid' => $uniacid,
				'realname' => $qcmember['member_name'],
				'mobile' => $qcmember['mobile'],
				'email' => $qcmember['email'],
				'salt' => $salt,
				'password' => md5($password . $salt), //默认密码为复杂密码
				'credit1' => 0,
				'credit2' => 0,
				'groupid' => 1,
				'createtime' => time(),
			);
		}

	}

	function syncMemberToQc($uid) {
		//把会员数据提交到晴川数据库
		//不知有没有默认值
		//有一定风险，暂时不做
	}

	//只作增量同步，全量同步仅执行一次，而且是以导出sql的形式
	//每次同步50个会员，由外部控制是否循环
	function syncMembers($uniacid) {
		$lastSyncId = $this->db->get('sync_settings', 'value', ['key'=>'last_sync_member_rowno']);
		//微信-》晴川会员中心同步 //禁用
		//微信的不执行同步，仅执行注册时新增。
		//晴川会员中心-》微信同步
		$start = $lastSyncId+1;
		$end = $start + 499; //每页500个
		//$qcmembers = $this->getMemberList(1, 500, "rowno>'{$lastSyncId}'"); //NND没有精确到时间！
		$stmt = $this->db2->pdo->prepare("select * from (SELECT ROW_NUMBER() OVER(ORDER BY init_date ASC) AS rowno , * FROM memberinfo
		) a where rowno between {$start} and {$end}");  
		$stmt->execute();
		$qcmembers = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$count = 0;
		foreach($qcmembers as $qcmember) {
			$lastSyncId = max($qcmember['rowno'], $lastSyncId); //必须根据init_date注册时间来排序
			$salt = substr(md5(microtime()), rand(0, 24), 8);
			$this->db->insert('ims_mc_members', array(
			'uniacid' => $uniacid,
			'realname' => $qcmember['member_name'],
			'mobile' => $qcmember['mobile'],
			'email' => $qcmember['email'],
			'salt' => $salt,
			'password' => 'notset', //密码不可用
			'credit1' => 0,
			'credit2' => 0,
			'groupid' => 1,
			'createtime' => time(),
			));
			$count++;
		}
		$this->db->update('sync_settings', ['value'=>$lastSyncId, 'update_time'=>date('Y-m-d H:i:s')], ['key'=>'last_sync_member_rowno']);
		return $count;
	}

	//默认每页20条
	function getMemberList($page=1, $perpage=20, $condition='1=1') {
		$dbh = $this->db2->pdo;
		$start = 1 + ($page - 1) * $perpage;
		$end = $start + $perpage - 1;
		$stmt = $dbh->prepare("select * from (SELECT ROW_NUMBER() OVER(ORDER BY init_date ASC) AS rowno , * FROM memberinfo
				where {$condition}
			) a where rowno between {$start} and {$end}");  
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	//获取单个用户资料，包含会员卡信息
	function getMemberInfo($uid) {
		return $this->db2->select('memberinfo'
			, ["[>]cardinfo" => ["member_no" => "member_no"]]
			, '*'
			, ['memberinfo.member_no'=>$uid]
			);  
	}

	//获取单个会员卡资料
	function getCardInfo($cardno) {
		return $this->db2->select('cardinfo', '*', ['card_no'=>$cardno]);  
	}

	//积分消费
	function useCredit($uid, $amount, $remark) {
		//事务
		$this->db2->update('memberinfo', [
		'jf[-]' => $amount,
		], ['member_no[=]'=>$uid]);
		//积分流水表.部门编号要填什么？2001可以吗？
		//积分流水表.单号要填什么？WX+YmdHis可以吗？
		//操作人要填什么？微信服务号
		//积分类型：消费、赠送、兑换、清零
		//消费金额：0
		//单据状态：留空？
		$this->db2->insert('member_score_rec', [
			'dh' => 'LZ'. date('YmdHis'),
			'from_bm' => 2001,
			'score' => -$amount,
			'member_no' => $uid,
			'remark' => $remark,
			'work_peo' => '微信服务号',
			'work_date' => date('Y-m-d H:i:s'),
			'type' => '兑换',
			'sy' => 0,
			'status' => 0,
			'repkey' => 0,
			]);
		//1608090103000159	1000	96.0000	FS20017897	零售记录	1103	2016-08-09 00:00:00.000	消费	96.3000	3	0'
		return 1;
	}
	
	//获取积分
	function addCredit($uid, $amount) {
		$this->db2->update('memberinfo', [
		'jf[+]' => $amount,
		], ['member_no[=]'=>$uid]);
		//积分流水表.部门编号要填什么？2001可以吗？
		//积分流水表.单号要填什么？WX+YmdHis可以吗？
		//操作人要填什么？微信服务号
		//积分类型：消费、赠送、兑换、清零
		//消费金额：0
		//单据状态：留空？
		$this->db2->insert('member_score_rec', [
			'dh' => 'LZ'. date('YmdHis'),
			'from_bm' => 2001,
			'score' => $amount,
			'member_no' => $uid,
			'remark' => $remark,
			'work_peo' => '微信服务号',
			'work_date' => date('Y-m-d H:i:s'),
			'type' => '赠送',
			'sy' => 0,
			'status' => 0,
			'repkey' => 0,
			]);
		return 1;
	}

	//返回所有积分兑换|获取日志
	function getCreditLogs($page=1, $perpage=20, $conditions=[]) {
		$dbh = $this->db2->pdo;
		$start = 1 + ($page - 1) * $perpage;
		$end = $start + $perpage - 1;
		$stmt = $dbh->prepare("select * from (SELECT ROW_NUMBER() OVER(ORDER BY work_date DESC) AS rowno , * FROM member_score_rec) a where rowno between {$start} and {$end}");  
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}




}



