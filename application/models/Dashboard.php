<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Model {

	public function monitoring_unit_csa($by_area, $code = '') {
		$result	= get_date_shift();
		$this->db->select('table_monitoringoperations.*, table_enum.description as color, IF(table_monitoringoperations.position = \'K\', \'Kosongan\',b.cargo) as cargo_awal, b.remark as remark_awal');
		$this->db->from('(SELECT MAX(id) as id FROM table_monitoringoperations WHERE DATE(table_monitoringoperations.time_in) = \''.$result['date'].'\' GROUP BY cn_unit) as a');
		$this->db->join('table_monitoringoperations','a.id = table_monitoringoperations.id','LEFT');
		// OLD
		// $this->db->join('table_shiftoperations','table_monitoringoperations.ref_id = table_shiftoperations.id','LEFT');
		$this->db->join('(SELECT table_shiftoperations.* FROM (SELECT MAX(id) as id FROM `table_shiftoperations` WHERE date = \''.$result['date'].'\' GROUP BY cn_unit) as a LEFT JOIN table_shiftoperations ON table_shiftoperations.id = a.id) as b','table_monitoringoperations.cn_unit = b.cn_unit','LEFT');
		$this->db->join('table_enum','b.cargo = table_enum.name AND table_enum.type = \'cargo_muatan\'','LEFT');
		// $this->db->where('table_shiftoperations.date', $result['date']);
		$this->db->where('table_monitoringoperations.by_area', $by_area);
			if (strtolower($code) == 'l') {
	 			$this->db->where('table_monitoringoperations.time_out !=', NULL);
			} else {
				$this->db->where('table_monitoringoperations.time_out', NULL);
			}
		return $this->db->get();
	}

	public function total_monitoring($by_area, $code = '') {
		$result 			= get_date_shift();
		$this->db->select('SUM(IF(table_monitoringoperations.position = \'M\', 1, 0)) as muatan, SUM(IF(table_monitoringoperations.position = \'K\', 1, 0)) as kosongan');
		$this->db->from('(SELECT MAX(id) as id FROM table_monitoringoperations GROUP BY cn_unit) as a');
		$this->db->join('table_monitoringoperations','a.id = table_monitoringoperations.id','LEFT');
		// $this->db->join('table_shiftoperations','table_monitoringoperations.ref_id = table_shiftoperations.id','LEFT');
		$this->db->join('table_enum','table_monitoringoperations.cargo = table_enum.name AND table_enum.type = \'cargo_muatan\'','LEFT');
		$this->db->where('DATE(table_monitoringoperations.time_in)', $result['date']);
		$this->db->where('table_monitoringoperations.by_area', $by_area);
			if (strtolower($code) == 'l') {
	 			$this->db->where('table_monitoringoperations.time_out !=', NULL);
			} else {
				$this->db->where('table_monitoringoperations.time_out', NULL);
			}
		return $this->db->get();
	}
}