<?php
function addSpaceWho($str){
	$len = mb_strlen($str,"UTF-8");
	$len = 4 - $len;
	for($i = 0;$i < $len*2;$i++){
		$str = $str." ";
	}
	return $str;
}

function createLogStr($theTime,$who,$where,$doThings){
	return $theTime." "."*".addSpaceWho($who)."*".$where." "."*".$doThings;
}

function writeToLog($theTime,$who,$where,$doThings){
		$da = date('Y-m-d');
		
		//设置时区为东八区，获取当前服务器系统时间
		date_default_timezone_set('Asia/Shanghai');
		$theTime = date('y-m-d H:i:s',time());
		
		$theLog = createLogStr($theTime,$who,$where,$doThings);
		$myfile = './logs/'.$da.'.txt';
		$myfile = fopen($myfile, "a+");
		fwrite($myfile, $theLog."\n");
		fclose($myfile);
}

?>