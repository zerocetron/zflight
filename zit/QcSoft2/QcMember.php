<?php
namespace zit\QcSoft;

use Flight;

class QcMember{

	protected $db; //local mysql
	protected $db2; //sqlserver

	function __construct() {
		$this->db = Flight::get('db');
		$this->db2 = Flight::get('db2');
//		$datas = $this->db
////			->debug()
//			->select('ims_account',  'acid', ['acid[>]'=>1, 'ORDER' => ['acid'=>'DESC'], 'LIMIT'=>1]);
//		var_dump($datas);
//		exit;
	}

	//默认每页20条
	function getMemberList($page=2, $perpage=20) {
		//return $this->db2->debug()->select('memberinfo', 'member_no', ['LIMIT'=>5]);

		$dbh = $this->db2->pdo;
//		$stmt = $dbh->prepare("SELECT top 5 * FROM memberinfo");  
		$start = 1 + ($page - 1) * $perpage;
		$end = $start + $perpage - 1;
		$stmt = $dbh->prepare("select member_no, member_name from (SELECT ROW_NUMBER() OVER(ORDER BY member_no ASC) AS rowno , * FROM memberinfo) a where rowno between {$start} and {$end}");  
		
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		while ($row = $stmt->fetch()) {  
			return($row);  
		}  
		return $this->db2->select('memberinfo', ['top 10 *'], ['member_no[=]'=>'00000002']);
		return [];
	}

	//获取单个用户资料
	function getMemberInfo($uid) {
		return $this->db2->select('memberinfo', '*', ['member_no'=>$uid]);  
		return [];
	}

	//积分消费
	function useCredit($uid, $amount) {
		return 1;
	}
	
	//获取积分
	function addCredit($uid, $amount) {
		return 1;
	}

	//返回所有积分兑换|获取日志
	function getCreditLogs($page=1, $uid=null, $date=null) {
		return [];
	}




}



