<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Monitoring_model extends CI_Model
{
	private $table = 'table_settingunit';
	public function monitoring_csa($by_area, $code = '') {
		$result 			= get_date_shift();
		// $by_area			= $this->session->userdata('area');
		$this->db->select('table_shiftoperations.*, table_enum.description as color')
		->from('(SELECT MAX(id) as id FROM `table_shiftoperations` where date = \''.$result['date'].'\' GROUP BY cn_unit) as a')
		->join('table_shiftoperations', 'a.id = table_shiftoperations.id', 'LEFT')
		->join('table_enum','table_shiftoperations.cargo = table_enum.name','LEFT')
		->where('by_area', $by_area);
		if (strtolower($code) == 'l') {
			$this->db->group_start();
 			$this->db->where('code_stby', 'L');
			$this->db->or_where('operation !=', '0');
			$this->db->group_end();
		} else {
			$this->db->group_start();
			$this->db->where('code_stby !=', 'L');
			$this->db->where('operation', '0');
			$this->db->group_end();
		}
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	

	public function total_monitoring($by_area, $code = '') {
		$result 			= get_date_shift();
		// $by_area			= $this->session->userdata('area');
		$this->db->select('SUM(IF(position = \'M\', 1, 0)) as muatan, SUM(IF(position = \'K\', 1, 0)) as kosongan')
		->from('(SELECT MAX(id) as id FROM `table_shiftoperations` where date = \''.$result['date'].'\' GROUP BY cn_unit) as a')
		->join('table_shiftoperations', 'a.id = table_shiftoperations.id', 'LEFT')
		->where('by_area', $by_area);
		// ->group_by('position');
		if (strtolower($code) == 'l') {
			$this->db->group_start();
 			$this->db->where('code_stby', 'L');
			$this->db->or_where('operation !=', '0');
			$this->db->group_end();
		} else {
			$this->db->group_start();
			$this->db->where('code_stby !=', 'L');
			$this->db->where('operation', '0');
			$this->db->group_end();
		}
		return $this->db->get();
	}

	public function monitoring_muatan($time_passing='')
	{
		$result 			= get_date_shift();
		$by_area			= $this->session->userdata('area');
		$this->db
		->from('table_shiftoperations')
		->where('date', $result['date'])
		->where('HOUR(time_out)', $time_passing)
		->where('position', 'M')
		->group_start()
		->where('code_stby', 'L')
		->or_where('operation', '1')
		->group_end();


		if ($by_area) {
			$this->db->where('by_area', $by_area);
		}
		return $this->db->get();
	}

	public function supplay_passing()
	{
		$result = get_date_shift();

		$jam = 6;
		if ($result['shift'] == 2) {
			$jam = 18;

		}
		for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
			$this->db->select('SUM(IF(HOUR(time_out) = ' . $a . ', 1, 0)) as actual_' . $i);
		}
		$this->db->select('table_supplaypassing.*, SUM(IF(HOUR(time_out) = 14, 1, 0)) as actual_14');
		$this->db->from('table_supplaypassing');
		$this->db->join('table_shiftoperations', 'table_supplaypassing.material = table_shiftoperations.cargo AND table_supplaypassing.date = table_shiftoperations.date AND table_shiftoperations.position = \'M\' AND (table_shiftoperations.code_stby = \'L\' OR table_shiftoperations.operation = 1)', 'LEFT');
		$this->db->where('table_supplaypassing.date',$result['date']);

		$this->db->where('table_supplaypassing.shift',$result['shift']);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('table_supplaypassing.material');
		return $this->db->get();
	}



	public function hour_supplay_passing()
	{
		$result = get_date_shift();

		$jam = 6;
		if ($result['shift'] == 2) {
			$jam = 18;

		}	
		$this->db->select('table_supplaypassing.id,table_supplaypassing.created_at,table_supplaypassing.updated_at,table_supplaypassing.deleted_at,table_supplaypassing.date,table_supplaypassing.shift,table_supplaypassing.material');
		for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
			$this->db->select('SUM(IF(HOUR(time_out) = ' . $a . ', 1, 0)) as actual_' . $i);
			$this->db->select('SUM(jam_'.$i.') as jam_' . $i);
			$this->db->select('GROUP_CONCAT(DISTINCT IF(HOUR(table_statuspassing.time) = '.$a.',table_statuspassing.status,\'\') SEPARATOR \'\') as status_' . $i);
			$this->db->select('GROUP_CONCAT(DISTINCT IF(HOUR(table_statuspassing.time) = '.$a.',table_statuspassing.keterangan,\'\') SEPARATOR \'\') as keterangan_' . $i);
		}
		$this->db->from('table_supplaypassing');
		$this->db->join('table_shiftoperations', 'table_supplaypassing.material = table_shiftoperations.cargo AND table_supplaypassing.date = table_shiftoperations.date AND table_shiftoperations.position = \'M\' AND (table_shiftoperations.code_stby = \'L\' OR table_shiftoperations.operation = 1 AND table_shiftoperations.deleted_at is null)', 'LEFT');


		$this->db->join('table_statuspassing', 'table_shiftoperations.date = table_supplaypassing.date AND table_supplaypassing.shift = table_statuspassing.shift', 'LEFT');
		$this->db->where('table_supplaypassing.date',$result['date']);

		$this->db->where('table_supplaypassing.shift',$result['shift']);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('table_supplaypassing.shift');
		return $this->db->get();
	}
	
}
?>