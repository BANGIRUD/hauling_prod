<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	function __construct() {
		header('Content-type: application/json');
		parent::__construct();	
		$this->load->model('Crud');
	}

	public function shift_operation($id ='1') {
		$sql = $this->Crud->sql_query("SELECT `shift_breakdown`.*, `equipment`.`ellipse` FROM `shift_breakdown` LEFT JOIN `equipment` ON `shift_breakdown`.`unit_id` = `equipment`.`unit_id` WHERE `shift_breakdown`.`id` = '$id'");
		if($sql->num_rows() > 0 ){
			$response = array();
			$response["data"] = array();
			foreach ($sql->result_array() as $x) {
				$rfu_date = $x['rfu_date'];
				$rfu_time = $x['rfu_date'] == '0000-00-00' ? '' : $x['rfu_time'];
				$h['id'] 				= $x['id'];
				$h['date'] 				= $x['date'];
				$h['shift'] 			= $x['shift'];
				$h['unit_id'] 			= $x['unit_id'];
				$h['ellipse'] 			= $x['ellipse'];
				$h['description']		= $x['description'];
				$h['bd_code'] 			= $x['bd_code'];
				$h['bd_comp'] 			= $x['bd_comp'];
				$h['bd_part'] 			= $x['bd_part'];
				$h['bd_date'] 			= $x['bd_date'];
				$h['bd_time'] 			= date('H:i', strtotime($x['bd_time']));
				$h['rfu_date'] 			= $rfu_date;
				$h['rfu_time'] 			= date('H:i', strtotime($rfu_time));
				$h['position'] 			= $x['position'];
				$h['location'] 			= $x['location'];
				$h['setting_trailer'] 	= $x['setting_trailer'];
				$h['replace_trailer'] 	= $x['replace_trailer'];
				$h['hm'] 				= $x['hm'];
				$h['wr'] 				= $x['wr'];
				$h['remark'] 			= $x['remark'];
				$h['section'] 			= $x['section'];
				$h['by_area'] 			= $x['by_area'];
				$h['by_user'] 			= $x['by_user'];

				array_push($response["data"], $h);
			}
		}else {
			$response["data"]="empty";  
		}
		echo json_encode($response);
	}

	public function enum($id ='') {
		$sql = $this->Crud->search('enum', array('id' => $id))->result_array();
		if(count($sql) > 0 ){
		  $response = array();
		  $response["data"] = array();
		  foreach ($sql as $x) {
		    $h['id'] 					= $x["id"];
		    $h['created_at'] 			= $x["created_at"];
		    $h['updated_at'] 			=$x["updated_at"];
			$h['deleted_at'] 			=$x["deleted_at"];
		    $h['code'] 					= $x["code"];
		    $h['name'] 					= $x["name"];
		    $h['category'] 				= $x["category"];
		    $h['category_description'] 	= $x["category_description"];
		    $h['type'] 					= $x["type"];
		    $h['by_user'] 				= $x["by_user"];
		    array_push($response["data"], $h);
		  }
		}else {
		  $response["data"]="empty";  
		}
		echo json_encode($response);
	}

	public function people($id ='') {
		$sql = $this->Crud->search('table_users', array('id' => $id))->result_array();
		if(count($sql) > 0 ){
			$response = array();
			$response["data"] = array();
			foreach ($sql as $x) {
				$h['id'] = $x["id"];
				$h['nrp'] = $x["nrp"];
				$h['username'] = $x["username"];
				$h['full_name'] = $x["full_name"];
				$h['description'] = $x["description"];
				$h['level'] = $x["level"];
				$h['last_login'] = $x['last_login'];
				array_push($response["data"], $h);
			}
		}else {
			$response["data"]="empty";  
		}
		echo json_encode($response);
	}

	public function setting_updated() {
		$data = $this->Crud->sql_query("SELECT `date` FROM `shift_ritase` ORDER BY `date` DESC LIMIT 1");
		$response = array();
			if($data->num_rows() > 0 ){
				$response["data"] 	= array();
				foreach ($data->result_array() as $x) {
					$h['date'] 			= $x['date'];
				array_push($response["data"], $h);
				}
			}else {
				$response["data"]="empty";  
			}
		echo json_encode($response);
	}

}