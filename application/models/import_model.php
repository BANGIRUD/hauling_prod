<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Import_model extends CI_Model
{
	public function import_setting_daily_register($date,$unit_id,$register,$remark,$by_user) {
		return $this->db->insert('table_settingunit',array(
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'deleted_at' => NULL,
			'date' 		 => $date,
			'unit_id' 	 => $unit_id,
			'ellipse'    => '',
			'csa' 		 => '',
			'register'   => $register,
			'remark'     => $remark,
			'by_user'    => $by_user,
		));
	}

	
}
?>