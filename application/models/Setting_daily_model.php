<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Setting_daily_model extends CI_Model
{
	private $table = 'table_settingunit';
	public function show_operation() {
		$result 			= get_date_shift();
		// $by_area			= $this->session->userdata('area');
		$this->db->select('a.id, table_equipment.*, a.register, a.remark')
		->from('table_equipment')
		->join('(SELECT table_settingunit.* FROM (SELECT MAX(id) as id FROM `table_settingunit` WHERE date = \'' . $result['date'] . '\' GROUP BY unit_id) as a LEFT JOIN table_settingunit ON a.id = table_settingunit.id) as a', 'a.unit_id = table_equipment.unit_id', 'LEFT');
		return $this->db->get();
	}
	
}
?>