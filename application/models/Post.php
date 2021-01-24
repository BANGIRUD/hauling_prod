<?php defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Model {

	public function monitoring_operations_34_muatan($position = 'M')
	{
		$result = get_date_shift();
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as name_rom');
		$this->db->from('table_romoperations');
		$this->db->join('table_shiftoperations','table_romoperations.ref_id = table_shiftoperations.id','LEFT');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.id NOT IN (SELECT ref_id FROM (SELECT table_monitoringoperations.* FROM (SELECT MAX(id) as id FROM `table_monitoringoperations`
			WHERE deleted_at IS NULL AND date(time_in) = \''.$result['date'].'\' AND by_area = 11
			GROUP BY cn_unit) as a
			LEFT JOIN table_monitoringoperations ON a.id = table_monitoringoperations.id WHERE time_out IS NULL) as a)');
		// $this->db->where('table_shiftoperations.id IN (
		// 	)');
		$this->db->where('table_shiftoperations.id NOT IN (SELECT ref_id FROM `table_monitoringoperations` WHERE deleted_at IS NULL AND by_area = 10)');
		// $this->db->where('table_shiftoperations.id IN ()');
		$this->db->where('table_shiftoperations.date', $result['date']);
		return $this->db->get();
	}

	public function data_shift_operation_to_monitoring_34($id = 1)
	{
		$this->db->from('table_shiftoperations');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function monitoring_operations_34_standby($code = '')
	{	
		$result = get_date_shift();
		$this->db->select('table_monitoringoperations.*, cargo.description as color, os.csa , os.time,st.register`');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->join('(SELECT table_shiftos.* FROM (SELECT MAX(id) as id FROM `table_shiftos` WHERE deleted_at IS NULL GROUP BY no_id) as a 
			LEFT JOIN table_shiftos ON a.id = table_shiftos.id) os','table_monitoringoperations.cn_unit = os.no_id','LEFT');
		$this->db->join('(SELECT table_settingunit.* FROM (SELECT MAX(id) as id FROM `table_settingunit` WHERE deleted_at IS NULL GROUP BY unit_id) as a 
			LEFT JOIN table_settingunit ON a.id = table_settingunit.id) st','table_monitoringoperations.cn_unit = st.unit_id','LEFT');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		$this->db->where('table_monitoringoperations.by_area', 10);
		$this->db->where('DATE(table_monitoringoperations.time_in)', $result['date']);
		$this->db->group_by('table_monitoringoperations.id');

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

		return $this->db->get();
	}

	public function data_monitoring_operations_34_standby($id)
	{	
		$this->db->select('table_monitoringoperations.*, cargo.description as color');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.id = \''.$id.'\'');
		return $this->db->get();
	}
}