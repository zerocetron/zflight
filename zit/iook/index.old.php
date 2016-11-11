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
.iguilt{
	background:green;
	padding:2px 5px;
	margin:2px 5px;
}
.ipower{
	background:red;
	padding:2px 5px;
	margin:2px 5px;
}

    #circle_bot{  
    background-color:red;  
    width: 150px;  
    height: 150px;  
    margin: 0px 0 0 0px;  
    border-radius: 50%;  
    }  
    #circle_mid {  
    background-color:green;  
    width: 90px;  
    height: 45px;  
    margin: -125px 0 0 25px;  
    border-radius:  90px 90px 0 0;  
    }  
    #circle_mid_in {  
    background-color:blue;  
    width: 90px;  
    height: 90px;  
    margin: -125px 0 0 25px;  
    border-radius: 50%;  
    }  
	#circle_mid:after {  
	    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    background: red;
    border: 18px solid #eee;
    border-radius: 100%;
    width: 12px;
    height: 12px;
	
	}
.semi-circle {
	background:blue;
	border-radius: 90px 90px 0 0;
	height: 60px;
/*			-webkit-transform: rotate(45deg);*/
/*		-ms-transform: rotate(45deg);*/
/*		-o-transform: rotate(45deg);*/
/*		transform: rotate(45deg);*/
}
.arc{
		width:100px;
		height:100px;
		background:blue;
		border-radius: 100px 0;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		transform: rotate(45deg);
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
</style>

<div style="width:500px; margin:30px auto">

<div id="yin-yang">
	<div></div>
</div>

<div style="position:relative;width:128px;height:123px;">
	<div style="position:absolute;width:128px;height:123px;background:url(1.jpg) no-repeat 0 0"></div>
	<div style="position:absolute;width:128px;height:53px;top:70px;background:url(1.jpg) no-repeat 0 bottom"></div>
</div>



<div><i style="color:#FF9800; font-size:20px"><?=$c->power_name?></i></div>

<div>尽职指数：<i style="color:green;"><?=$c->judge_rate?></i> <button>签到</button></div>

<div>
负罪感
	<div style="display:inline-block; width:300px; background:red;">
		<div style="background:green; height:20px; width:77%"> </div>
	</div>
成就感

</div>
<div style="height:150px">
	<div id="circle_bot">  
    </div>  
    <div id="circle_mid">  

    </div>  
</div>
	<div class="semi-circle">弧形</div>
<div>
功	罪恶	绩
</div>

<div>
	<span class="iguilt">拖出去斩了</span> <span class="ipower">赐良田千亩</span> <span class="iguilt">记过</span> 
</div>






</div>
</body>
</html>