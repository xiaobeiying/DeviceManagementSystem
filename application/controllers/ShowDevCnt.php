<?php 
require dirname(__FILE__)."/../libraries/CI_Log.php";
require dirname(__FILE__)."/../libraries/CI_Util.php";
class ShowDevCnt extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ShowDevMod');
	}
	
	//条件查询符合要求的设备
	public function searchDevs(){
		$plateform = $_GET['plateform'];
		$brand = $_GET['brand'];
		$version = $_GET['version'];
		$status = $_GET['status'];
		$category = $_GET['category'];
		$borrower = $_GET['borrower'];
		$old_dev = $_GET['old_dev'];
		$phone_Cores = $_GET['phone_Cores'];
		$phone_resolution = $_GET['phone_resolution'];
		$hdexport = $_GET['hdexport'];
		
		echo json_encode($this->ShowDevMod->searchDevs($plateform,$brand,$version,$status,$category,$borrower,$old_dev,$phone_Cores,$phone_resolution,$hdexport));
	}
	
	//根据签借人获取设备
	function getDevByBorrower(){
		//$borrower = $_GET['borrower'];
		$borrower = getMemberFromIP();
		echo json_encode($this->ShowDevMod->getDevByBorrower($borrower));
	}
}
?>