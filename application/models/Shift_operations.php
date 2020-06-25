<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Shift_operations extends CI_Model
{
	private $table = 'table_shiftoperations';

	public function data_production($code='')
	{
		$result 			= get_date_shift();
		$by_area			= $this->session->userdata('area');

		$this->db->select('table_shiftoperations.*, table_enum.name as position, pos.name as location_description, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum', 'table_shiftoperations.position = table_enum.id','LEFT');
		$this->db->join('table_enum as pos', 'table_shiftoperations.location = pos.id','LEFT');
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.cn', 'LEFT');
		$this->db->where('table_shiftoperations.date = \''.$result['date'].'\'');
		if ($by_area) {
			$this->db->where('table_shiftoperations.by_area', $by_area);
		}
		if (strtolower($code) == 'l') {
			$this->db->group_start();
 			$this->db->where('code_stby', 'L');
			$this->db->or_where('operation !=', '0');
			$this->db->group_end();
		} elseif (strtolower($code) != '') {
			$this->db->group_start();
			$this->db->where('code_stby !=', 'L');
			$this->db->where('operation', '0');
			$this->db->group_end();
		}
		$this->db->order_by('table_shiftoperations.date asc, table_shiftoperations.time_in asc');
		
		return $this->db->get();
	}

	public function daily_record_production($by_area, $code='')
	{
		$result 		= get_date_shift();	
		$this->db->select('table_shiftoperations.*, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time, table_enum.code as loc_code, cargo.description as color');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum','table_shiftoperations.location = table_enum.id','LEFT');
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.no_id', 'LEFT');

		$this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = \''.$result['date'].'\'');
		// $this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = "2020-05-18"');
		// $this->db->where('table_shiftoperations.deleted_at IS NULL ');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		if ($by_area) {
			$this->db->where('table_shiftoperations.by_area', $by_area);
		}
		if (strtolower($code) == 'l') {
			$this->db->group_start();
 			$this->db->where('code_stby', 'L');
			$this->db->or_where('operation !=', '0');
			$this->db->group_end();
		} elseif (strtolower($code) != '') {
			$this->db->group_start();
			$this->db->where('code_stby !=', 'L');
			$this->db->where('operation', '0');
			$this->db->group_end();
		}
		$this->db->order_by('table_shiftoperations.by_ordered asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function detail_shift_operations($id)
	{
		$this->db->select('table_shiftoperations.*, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.no_id', 'LEFT');
		$this->db->where('table_shiftoperations.id = \''.$id.'\'');
		return $this->db->get();
	}


}
?>