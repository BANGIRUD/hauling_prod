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
		$this->db->select('table_monitoringoperations.*, table_enum.description as color, IF(table_monitoringoperations.position = \'K\', \'Kosongan\',b.cargo) as cargo_awal, b.remark as remark_awal');
		$this->db->from('(SELECT MAX(id) as id FROM table_monitoringoperations WHERE DATE(table_monitoringoperations.time_in) = \''.$result['date'].'\' GROUP BY cn_unit) as a');
		$this->db->join('table_monitoringoperations','a.id = table_monitoringoperations.id','LEFT');

		// OLD
		// $this->db->join('table_shiftoperations','table_monitoringoperations.ref_id = table_shiftoperations.id','LEFT');

		$this->db->join('(SELECT table_shiftoperations.* FROM (SELECT MAX(id) as id FROM `table_shiftoperations` WHERE date = \''.$result['date'].'\' GROUP BY cn_unit) as a
LEFT JOIN table_shiftoperations ON table_shiftoperations.id = a.id) as b','table_monitoringoperations.cn_unit = b.cn_unit','LEFT');


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

	public function monitoring_muatan($time_passing='')
	{
		$result 			= get_date_shift();
		$by_area			= $this->session->userdata('area');
		$this->db->select('table_monitoringoperations.*, table_enum.description as color');
		$this->db->from('(SELECT MAX(id) as id FROM table_monitoringoperations GROUP BY ref_id) as a');
		$this->db->join('table_monitoringoperations','a.id = table_monitoringoperations.id','LEFT');
		$this->db->join('table_shiftoperations','table_monitoringoperations.ref_id = table_shiftoperations.id','LEFT');
		$this->db->join('table_enum','table_monitoringoperations.cargo = table_enum.name AND table_enum.type = \'cargo_muatan\'','LEFT');
		$this->db->where('table_shiftoperations.date', $result['date']);
		$this->db->where('HOUR(table_monitoringoperations.time_passing)', $time_passing);
		$this->db->where('table_monitoringoperations.by_area', $by_area);
		if ($by_area) {
			$this->db->where('table_monitoringoperations.by_area', $by_area);
		}
		return $this->db->get();
	}

	public function supplay_passing()
	{
		$result 	= get_date_shift();
		$by_area	= $this->session->userdata('area');
		$jam = 6;
		if ($result['shift'] == 2) {
			$jam = 18;

		}
		for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
			$this->db->select('SUM(IF(HOUR(time_passing) = ' . $a . ', 1, 0)) as actual_' . $i);
		}
		$this->db->select('table_supplaypassing.*,cargo.description as color,');
		$this->db->from('table_supplaypassing');
		$this->db->join('table_enum as cargo','table_supplaypassing.material = cargo.name','LEFT');
		$this->db->join('(
			SELECT table_shiftoperations.*, a.time_out, a.time_passing FROM `table_shiftoperations`
		LEFT JOIN (SELECT table_monitoringoperations.* FROM (SELECT MAX(id) as id FROM `table_monitoringoperations` GROUP BY ref_id) as a
		LEFT JOIN table_monitoringoperations ON a.id = table_monitoringoperations.id) as a ON a.ref_id = table_shiftoperations.id
		) as a', 'table_supplaypassing.material = a.cargo AND table_supplaypassing.date = a.date AND a.position = \'M\' AND a.time_out IS NOT NULL', 'LEFT');
		$this->db->where('table_supplaypassing.date',$result['date']);
		// if ($by_area) {
		// 	$this->db->where('table_monitoringoperations.by_area', $by_area);
		// }
		$this->db->where('table_supplaypassing.shift',$result['shift']);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('table_supplaypassing.material');
		return $this->db->get();
	}



	public function hour_supplay_passing()
	{
		$result = get_date_shift();
		$date   = $result['date'];
		$shift   = $result['shift'];

		$jam = 6;
		if ($result['shift'] == 2) {
			$jam = 18;
		}
		$select = "SELECT {$jam} jam, '{$date}' as date";
		for ($a=$jam+1, $i = 1; $i < 12; $i++, $a++) { 
			$select .= " UNION SELECT ".($a+1)." jam, '{$date}' as date";
		}
		// echo $select;
		// $this->db->distinct();
		$this->db->select('a.jam');
		// for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
		$this->db->select('SUM(IF(HOUR(time_passing) = a.jam, 1, 0)) as actual');
		$this->db->select('jam_1, jam_2, jam_3, jam_4, jam_5, jam_6, jam_7, jam_8, jam_9, jam_10, jam_11, jam_12');
		$this->db->select('IF(HOUR(table_statuspassing.time) = a.jam, table_statuspassing.status, "") as status');
		$this->db->select('IF(HOUR(table_statuspassing.time) = a.jam, table_statuspassing.keterangan, "") as keterangan');
		// $this->db->select('table_statuspassing.status, table_statuspassing.keterangan');
		// 	// $this->db->select('GROUP_CONCAT(DISTINCT IF(HOUR(table_statuspassing.time) = '.$a.',table_statuspassing.status,\'\') SEPARATOR \'\') as status_' . $i);
		// 	// $this->db->select('GROUP_CONCAT(DISTINCT IF(HOUR(table_statuspassing.time) = '.$a.',table_statuspassing.keterangan,\'\') SEPARATOR \'\') as keterangan_' . $i);
		// }
		$this->db->from('('.$select.') as a');
		$this->db->join('(SELECT `id`, `date`, `shift`, SUM(`jam_1`) jam_1, SUM(`jam_2`) jam_2, SUM(`jam_3`) jam_3, SUM(`jam_4`) jam_4, SUM(`jam_5`) jam_5, SUM(`jam_6`) jam_6, SUM(`jam_7`) jam_7, SUM(`jam_8`) jam_8, SUM(`jam_9`) jam_9, SUM(`jam_10`) jam_10, SUM(`jam_11`) jam_11, SUM(`jam_12`) jam_12 FROM `table_supplaypassing` WHERE date = \''.$date.'\' GROUP BY date, shift) as b', 'a.date = b.date AND b.shift = ' . $shift);
		$this->db->join('(
			SELECT table_shiftoperations.date, table_shiftoperations.position, a.time_out, a.time_passing FROM `table_shiftoperations`
		LEFT JOIN (SELECT table_monitoringoperations.* FROM (SELECT MAX(id) as id FROM `table_monitoringoperations` GROUP BY ref_id) as a
		LEFT JOIN table_monitoringoperations ON a.id = table_monitoringoperations.id) as a ON a.ref_id = table_shiftoperations.id
		) as c', 'b.date = c.date AND c.position = \'M\' AND c.time_out IS NOT NULL', 'LEFT');


		$this->db->join('table_statuspassing', 'a.date = table_statuspassing.date AND b.shift = table_statuspassing.shift', 'LEFT');
		// $this->db->where('table_supplaypassing.date',$result['date']);

		// $this->db->where('table_supplaypassing.shift',$result['shift']);
		// $this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('a.jam');
		return $this->db->get();
	}

	public function achievement_seam_series($date, $shift)
	{		
		$result = get_date_shift();
		$date = $date == '' ? $result['date'] : $date;
		$shift = $shift == '' ? $result['shift'] : $shift;
		if ($result['shift'] == 1) {
			$hour = 6;
		} else {
			$hour = 18;
		}
		$this->db->select('table_supplaypassing.*,table_enum.name as rom_spp,cargo.description as color,table_enum.id as rom_id');
		for ($a = 1, $i=$hour; $i < ($hour+12) ; $i++, $a++) { 
			$this->db->select('SUM(IF(HOUR(DATE_ADD(table_romoperations.time_out, INTERVAL 2 HOUR)) = '.$i.', 1, 0)) as actual_' . $a);
		}
		$this->db->from('table_supplaypassing');
		$this->db->join('table_enum','table_supplaypassing.rom = table_enum.code','LEFT');
		$this->db->join('table_enum as cargo','table_supplaypassing.material = cargo.name','LEFT');
		$this->db->join('table_romoperations','table_enum.id = table_romoperations.by_rom AND DATE(DATE_ADD(table_romoperations.time_out, INTERVAL 2 HOUR)) = table_supplaypassing.date','LEFT');
		$this->db->where('table_supplaypassing.date',$date);
		$this->db->where('table_supplaypassing.shift',$shift);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('table_supplaypassing.material');		
		$this->db->order_by('table_supplaypassing.id');
		return $this->db->get();
	}

	public function rom_supplaypassing($date, $shift)
	{
		$this->db->select('table_supplaypassing.*,table_enum.name as rom_spp,table_enum.id as rom_id');
		$this->db->from('table_supplaypassing');
		$this->db->join('table_enum','table_supplaypassing.rom = table_enum.code','LEFT');
		$this->db->where('table_supplaypassing.date',$date);
		$this->db->where('table_supplaypassing.shift',$shift);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('table_supplaypassing.rom');		
		$this->db->order_by('table_supplaypassing.id');
		return $this->db->get();
	}
	
}
?>