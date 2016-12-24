<?php
require '../../vendor/autoload.php';
$db = include(__DIR__.'/config.ini.php');
$message = @$_GET['message']?:'';

$level_names = $db->select('t_level_map', ['level', 'power', 'name3', '_name'], ['ORDER'=>['level'=>'ASC']]);

$names1 = $names2 = [];
foreach($level_names as $row) {
	if(!empty($row['name3'])) {
		$names1[] = [$row['level'], $row['power'], ("lv".$row['level'].".".$row['name3']), 'ipower'];
	}
	if(!empty($row['_name'])) {
		$names1[] = [$row['level'], $row['power'], "lv".$row['level'].".".$row['_name'], 'iguilt'];
	}

}

//ROUTER - 评价 ---------------------------------
if(@$_GET['do'] == 'pj') {
	//判断时间
	if(date('H') >=12 && date('H') < 14) {//只能在中午12点到14点之间
	//判断用户
		isset($user_id) || $user_id = 0; //system user
		//判断是否已注册
		$is_reg = $db->get('t_user_power', '*', ['user_id'=>$user_id]);
			//若无则注册
			if(empty($is_reg)) {
				$db->insert('t_user_power', [
					'user_id'=>$user_id,
					'total_power'=>0,
					'total_guilt'=>0,
					'regular_power'=>96*0,
					'regular_guilt'=>96*0,
					'register_date'=>date('Y-m-d'),
					'register_days'=>0,
					'sign_days'=>0,
					//todo:sign date or sign log.
					'power_name'=>'无名小卒',
					'power_name_update_time'=>time()
					]);
			}
	//判断是否已评价
		$is_pj = $db->select('t_user_power_record', 'id', ['AND'=>['user_id'=>$user_id,'date'=>date('Y-m-d')]]);
		if(empty($is_pj)) {
				//更新可用数值
				$db->update('t_user_power', [
					'regular_power[+]' => 96,
					'regular_guilt[+]' => 96,
					'register_days[+]' => 1, //todo:应该按照注册日期推算，可用在签到中做
					//'sign_days[+]' => 1, //todo:not must update here.
					]);
				//计算可用额度
				$user = (object)$db->get('t_user_power', '*', ['user_id'=>$user_id]);
				$day_power = $user->regular_power - $user->total_power - $user->total_guilt;
				$day_guilt = $user->regular_guilt - $user->total_guilt;
				if($_GET['class'] == 'iguilt' && $_GET['power'] > $day_guilt) {
					$message .= '惩戒已超限！当日最高可用惩戒：'.$day_guilt;
					goto html;
				}
				if($_GET['class'] == 'ipower' && $_GET['power'] > $day_power) {
					$message .= '奖赏已超限！当日最高可用奖赏：'.$day_power;
					goto html;
				}
	//插入记录
			$db->insert('t_user_power_record', [
				'user_id'=>$user_id,
				'date'=>date('Y-m-d'),
				'time'=>time(),
				'power'=>$_GET['class'] == 'iguilt'?(-1*$_GET['power']):$_GET['power'],
				'power_note'=>($_GET['class'] == 'iguilt'?'惩罚：':'奖赏：').$_GET['name']
				]);
			//更新用户数值表
				$db->update('t_user_power', [
					'total_power[+]' => $_GET['class'] == 'ipower'?$_GET['power']:0,
					'total_guilt[+]' => $_GET['class'] == 'iguilt'?$_GET['power']:0,
					]);
				//重定向到本页【如果是post就不用】

				header('Location:index.php?message=' . '奖惩操作成功');

		} else {
		$message .= '今天已实施奖惩，不可出尔反尔！';
		}
	} else {
		$message .= '非监督人时间(12:00~14:00)!';
	}
}

html:

?>
<html>
<head>
<title>iook务客——做你自己的监督者</title>
<link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
<?php
$c = new stdClass();
$c->power_name = '无名小卒';
$c->judge_rate = '99.7%';


?>

<style>
body{
	font-size:12px;
}
.normal-a{
    color: inherit;
    text-decoration: none;
}
.normal-a:hover{
    color: #666;
    text-decoration: underline;
}
.iguilt{
	background:#8BC34A;
	padding:8px 15px;
	margin:2px 5px;
	line-height:29px;
}
.ipower{
	background:#FFC107;
	padding:8px 15px;
	margin:2px 5px;
	line-height:29px;
}
#yin-yang {
width: 96px;
height: 48px;
background: #eee;
border-color: red;
border-style: solid;
border-width: 2px 2px 50px 2px;
border-radius: 100%;
position: relative;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		transform: rotate(45deg);

}
#yin-yang:before {
content: "";
position:
absolute;
top: 50%;
left: 0;
background: #eee;
border: 18px solid red;
border-radius: 100%;
width: 12px;
height: 12px;
}
#yin-yang:after {
content: "";
position: absolute;
top: 50%;
left: 50%;
background: red;
border: 18px solid #eee;
border-radius:100%;
width: 12px;
height: 12px;
}


    .circle_bot{  
    background-color:white;  
    width: 148px;  
    height: 148px;  
    margin: 0px 0 0 0px;  
    border-radius: 50%;  
	border-width: 1px;
    border-color: red;
    border-style: solid;
    }  
    .circle_mid {  
    background-color: white;
    width: 88px;
    height: 88px;
    /* margin: -125px 0 0 25px; */
    border-radius: 50%;
    border-width: 1px;
    border-color: green;
    border-style: solid;
    }  
.circle_mid_wrap {
    position: absolute;
    overflow: hidden;
    width: 90px;
    height: 20px;
    top: 25;
    left: 25px;
}
    .circle_mid_bot {  
    background-color: green;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    top: 25;
    left: 25;
    position: absolute;
    }  
.circle_bot_wrap {
    position: absolute;
    overflow: hidden;
    width: 150px;
    height: 93px;
}
    .circle_bot_bot {  
    background-color: red;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    position: absolute;
    }  


</style>

<div style="width:500px; margin:30px auto; text-align:center;">

<div id="yin-yang" style="margin:0 auto"></div>



<div><i style="color:#FF9800; font-size:20px; font-weight:bold;"><?=$c->power_name?></i></div>

<div>尽职指数：<i style="color:green;"><?=$c->judge_rate?></i> <button>签到</button></div>

<div>
负罪感
	<div style="display:inline-block; width:300px; background:red;">
		<div style="background:green; height:20px; width:77%"> </div>
	</div>
成就感

</div>
<div style="height:150px; width:150px; position:relative; margin:20px auto;">
	<div class="circle_bot_bot"></div>
	<div class="circle_bot_wrap">
	<div class="circle_bot">  
    </div></div>

	<div class="circle_mid_bot"></div>
	<div class="circle_mid_wrap">
    <div class="circle_mid">  
    </div></div>

	<div style="position:absolute; top:62">
	<i style="margin-left: 7px;" class="word_1">功</i>	<i style="margin-left: 28px;" class="word_2">罪恶</i>	<i style="margin-left: 40px;" class="word_3">绩</i>
	</div>
</div>

<div>
	<?php 
		foreach($names1 as $name):
	?>
	<a href="?do=pj&level=<?=$name[0]?>&name=<?=$name[2]?>&power=<?=$name[1]?>&class=<?=$name[3]?>" title="<?=$name[1]?>当量" class="normal-a <?=$name[3]?>"><?=$name[2]?></a>
	<?php endforeach;?>
</div>


<div style="text-align:left;padding:10px 50px;line-height:20px;text-decoration: underline;">
	<p>
		<b>发令人：</b>17:00~09:00 <u style="color: #0D47A1" title="蓝色，天空，太阳">¤</u><br />
		<b>执行人：</b>09:00~17:00 <u style="color: #9C27B0" title="执行人给予紫色，代表女性，听从，服从，顺从">◆</u><br />
		<b>监督人：</b>12:00~14:00 <u style="color:black" title="黑色，地下，阎王，公正无私">▲</u><br />
	</p>
</div>




</div>
<script>
<?php
	if(! empty($message)) {
		echo 'alert("'.$message.'")';
	}
?>
</script>
</body>
</html>