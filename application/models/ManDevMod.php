<?php 
class ManDevMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	//条件查询符合要求的设备
	public function searchManDevs($plateform,$brand,$version,$status,$category,$borrower,$old_dev,$phone_Cores,$phone_resolution,$hdexport){
		
		$queryString = "select a.id,device_name,model,theNum,owner,status,borrower,old_dev,borrow_time,hdexport,phone_Cores,phone_resolution,path,device_id from devices a left join dev_imgs b on a.id=b.device_id";
		
		$queryString = $queryString.' where a.id != ""';
		if($plateform == "all"){
			
		}else{
			$queryString = $queryString.' and a.plateform="'.$plateform.'"';
		}
		if($brand == "all"){
			
		}else{
			$queryString = $queryString.' and a.brand="'.$brand.'"';
		}
		if($version == "all"){
			
		}else{
			$queryString = $queryString.' and a.version like "'.$version.'"';
		}
		if($status == "all"){
			
		}else{
			$queryString = $queryString.' and a.status="'.$status.'"';
		}
		if($category == "all"){
			
		}else{
			$queryString = $queryString.' and a.category="'.$category.'"';
		}
		if($borrower == ""){
			
		}else{
			$queryString = $queryString.' and a.borrower like "%'.$borrower.'%"';
		}
		if($old_dev == "all"){
			
		}else{
			$queryString = $queryString.' and a.old_dev="'.$old_dev.'"';
		}
		if($phone_Cores == "all"){
			
		}else{
			$queryString = $queryString.' and a.phone_Cores="'.$phone_Cores.'"';
		}
		if($phone_resolution == "all"){
			
		}else{
			$queryString = $queryString.' and a.phone_resolution like "%'.$phone_resolution.'%"';
		}
		if($hdexport == "all"){

		}else{
			$queryString = $queryString.' and a.hdexport="'.$hdexport.'"';
		}
		
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	

	//借出设备或确认申请设备
	function confirmBorrowed($id,$borrower,$borrow_time){
		$data = array(
				"status" => "2",
				"borrower" => $borrower,
				"borrow_time"=>$borrow_time
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "success";
	}
	
	//拒绝申请设备
	function refuseBorrowed($id,$borrow_time){
		$data = array(
				"status" => "0",
				"borrower" => "",
				"borrow_time"=>$borrow_time
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "success";
	}
	
	//归还设备
	function confirmReturned($id){
		$data = array(
				"status" => "0",
				"borrower"=>"",
				"borrow_time"=>""
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "success";
	}
	
	//删除设备
	function deleteDev($id){
		$this->db->where('id',$id);
		$this->db->delete('devices');
		
		$this->db->where("device_id",$id);
		$this->db->delete('dev_imgs');
		
		
		return "success";
	}
	
	//修改设备基本信息
	function changeDevInfo($id,$device_name,$model,$theNum,$owner,$brand,$plateform,$version,$category,$other,$comments,$phone_resolution,$phone_CPU,$phone_GPU,$phone_Cores,$hdexport,$camera_1080p,$phone_Architecture){
		$id = $_POST['id'];
		$device_name = $_POST['dev_name'];
		$model = $_POST['dev_model'];
		$theNum = $_POST['dev_num'];
		$owner = $_POST['dev_owner'];
		$plateform = $_POST['dev_plateform'];
		$brand = $_POST['dev_brand'];
		$version = $_POST['dev_version'];
		$category = $_POST['dev_category'];
		$other = $_POST['dev_other'];
		$comments = $_POST['dev_comments'];
		$phone_resolution = $_POST['dev_resolution'];
		$phone_CPU = $_POST['dev_cpu'];
		$phone_GPU = $_POST['dev_gpu'];
		$phone_Cores = $_POST['dev_cores'];
		$hdexport = $_POST['dev_hdexport'];
		$camera_1080p = $_POST['dev_hdcamera'];
		$phone_Architecture = $_POST['dev_architecture'];
		
		$data = array(
				"device_name"=>$device_name,
				"model"=>$model,
				"theNum"=>$theNum,
				"owner"=>$owner,
				"plateform"=>$plateform,
				"brand"=>$brand,
				"version"=>$version,
				"category"=>$category,
				"other"=>$other,
				"comments"=>$comments,
				"phone_resolution"=>$phone_resolution,
				"phone_CPU"=>$phone_CPU,
				"phone_GPU"=>$phone_GPU,
				"phone_Cores"=>$phone_Cores,
				"hdexport"=>$hdexport,
				"camera_1080p"=>$camera_1080p,
				"phone_Architecture"=>$phone_Architecture
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
	}
	
	//修改签借人
	function changeBorrower($id,$borrower,$borrow_time){
		$data = array(
				"borrower" => $borrower,
				"borrow_time" => $borrow_time
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		
		return "success";
	}
	
	function getDevNum($id){
		$queryString = "select theNum,device_name,borrower from devices where id = ".$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
	
	//获取某个设备的所有信息
	function getDevAllInfo($id){
		$queryString = "select * from devices where id=".$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
	
}
?>