<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

//主机地址
$host = $_SERVER['HTTP_HOST'];

$theTime = date('y-m-d h:i:s',time());
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了关于系统页面";
writeToLog($theTime,$who,$where,$doThings);

?>
<style type="text/css">
#like-btn{
	cursor:pointer;
}
</style>

<div style="width: 100%;height:100%;background-color:#EEEEFF">

<div style="width: 100%;height:200px;background-color:#EEEEFF">
</div>

<div style="width: 100%;height:200px;background-color:#EEEEFF;text-align:center;">
<h2 style="margin-top:0px;margin-bottom:20px;color:">请大家爱护我们的测试机</h2>
<img style="margin:20px;width:100px;height:100px;"src="<?php echo "http://".$host."/imgs/click_on.png";?>"></img>
<img style="margin:20px;width:100px;height:100px;"src="<?php echo "http://".$host."/imgs/click_on.png";?>"></img>
<img style="margin:20px;width:100px;height:100px;"src="<?php echo "http://".$host."/imgs/click_on.png";?>"></img>
<h4 id="like-btn" style="margin-top:20px;margin-bottom:0px;color:">使用过程中如遇问题，请随时联系管理员</h4>
</div>

<div style="text-align:center;padding-top:20px;">
<h4 id="like" style="text-align:center;margin-top:20px;color:0000FF" hidden>QQ:2969***997 电话:182******88</h4>
<label style="margin-top:50px;margin-bottom:20px;color:">小影设备管理系统--DMS V1.0 </label></div>
</div>
</div>


<script type="text/javascript">
$('#like-btn').mousedown(function(){
	$("#like-btn").attr("src",'<?php echo "http://".$host."/imgs/click_down.png"; ?>');
	$("#like").show();
	var host = window.location.host;
	$.ajax({
    	type: "get",
        url: "http://" + host + "/index.php/welcome/likeDev",
        data: {},
        success: function (result) {
            
        }
   });
});

$('#like-btn').mouseup(function(){
});
</script>