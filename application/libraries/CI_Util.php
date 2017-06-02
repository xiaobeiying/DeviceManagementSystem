<?php	
function getMemberFromIP() {
	
	//return "Tony";
	//$userIP = $_SERVER["REMOTE_ADDR"];
	//return $userIP;
	
	//引入ManUserMod.php
	require_once "application/models/ManUserMod.php";
	
	$ses = isset($_POST['session'])?$_POST['session']:'';
	//根据不同的session状态，返回对应的数值，并显示当前登录用户
	if($ses != ""){
		if($ses == "null" || $ses == "undefined"){
			return "未知用户";
		}else{
			$session = $_POST['session'];
			
			//引用ManUserMod.php中的getUserInfoFromSession()方法
			$loginUserInfo = new ManUserMod();
			if(count($loginUserInfo->getUserInfoFromSession($session)) == "1"){
				$ar = array($loginUserInfo->getUserInfoFromSession($session));   //或者先声明$ar = array();再赋值$ar[] = array();
				$currentUser = current($ar[0])->login_name;
				return $currentUser;
			}else{
				return "Session过期";  //此用户在其他地方登陆，session过期
			}
			
			/**
			//引用ManUserMod.php中的getUserNameFromSession()方法
			$loginUserInfo = new ManUserMod();
			$currentUser = $loginUserInfo->getUserNameFromSession($session);
			if($currentUser != ""){
				return $currentUser;
			}**/
		}
	}else{
		return "Session为空";
	}
}


function getSessionStr(){
	//已登录的时间戳来作为session
	return time();
}

//打印两个日期之间的所有日期
function prDates($start,$end){
	$dt_start = strtotime($start);
	$dt_end = strtotime($end);
	while ($dt_start<=$dt_end){
		echo date('Y-m-d',$dt_start)."\n";
		$dt_start = strtotime('+1 day',$dt_start);
	}
}

//获取两个日期之间的所有日期为一个数组
function getDates($start,$end){
	$dt_start = strtotime($start);
	$dt_end = strtotime($end);
	$dateArr = array();
	$i = 0;
	while ($dt_start<=$dt_end){
		//echo date('Y-m-d',$dt_start)."\n";
		$dateArr[$i] = date('Y-m-d',$dt_start);
		$dt_start = strtotime('+1 day',$dt_start);
		$i++;
	}
	return $dateArr;
}
?>
