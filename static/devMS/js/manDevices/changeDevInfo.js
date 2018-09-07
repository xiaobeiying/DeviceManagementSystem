var host = window.location.host;

//修改设备信息
function changeDevInfo(e){
	e = e || window.event;
	butId = e.target.id;
	id = butId.substring(7);
	dev_name = $("#dev_name").val();
	dev_model = $("#dev_model").val();
	dev_num = $("#dev_num").val();
	dev_plateform = $("#dev_plateform").val();
	dev_owner = $("#dev_owner").val();
	dev_brand = $("#dev_brand").val();
	dev_version = $("#dev_version").val();
	dev_category = $("#dev_category").val();
	dev_other = $("#dev_other").val();
	dev_comments = $("#dev_comments").val();
	dev_resolution = $("#dev_resolution").val();
	dev_cpu = $("#dev_cpu").val();
	dev_gpu = $("#dev_gpu").val();
	dev_cores = $("#dev_cores").val();
	dev_hdexport = $("#dev_hdexport").val();
	dev_hdcamera = $("#dev_hdcamera").val();
	dev_architecture = $("#dev_architecture").val();
	
	
	if(typeof($(".input_style").attr("disabled"))=="undefined"){
		
		$.ajax({
        	type: "post",
            url: "http://" + host + "/index.php/ManDevCnt/changeDevInfo",
            data: {"id":id,"dev_name":dev_name,"dev_model":dev_model,"dev_num":dev_num,"dev_owner":dev_owner,"dev_plateform":dev_plateform,"dev_brand":dev_brand,"dev_version":dev_version,"dev_category":dev_category,"dev_other":dev_other,"dev_comments":dev_comments,"dev_resolution":dev_resolution,"dev_cpu":dev_cpu,"dev_gpu":dev_gpu,"dev_cores":dev_cores,"dev_hdexport":dev_hdexport,"dev_hdcamera":dev_hdcamera,"dev_architecture":dev_architecture},
            success: function (result) {
            	if(result == "success"){
            		alert("修改成功");
            		location.reload(); 
            	}else{
            		alert("修改失败");
            	}
            }
       });
       
		$(".input_style").attr("disabled","disabled");
		$("#"+butId).text("编 辑");
	}else if($(".input_style").attr("disabled") == "disabled"){
		
		$(".input_style").removeAttr("disabled");
		$("#"+butId).text("提 交");
	}
	
}

function deleteDevImg(e){
	e = e || window.event;
	butId = e.target.id;
	pic = butId.substring(7);
	con=confirm("确定删除该图片么?");
	if(con == true){
		$.ajax({
	    	type: "post",
	        url: "http://" + host + "/index.php/ManPicCnt/delTheDevPic",
	        data: {"pic":pic},
	        success: function (result) {
	        	if(result == "success"){
	        		location.reload(); 
	        	}else{
	        		alert("删除失败");
	        	}
	        }
	   });
	}else{
		
	}
}