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

	public function monitoring_operations_65_muatan()
	{
		$result = get_date_shift();
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as name_rom');
		$this->db->from('table_romoperations');
		$this->db->join('table_shiftoperations','table_romoperations.ref_id = table_shiftoperations.id','LEFT');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.id NOT IN (SELECT ref_id FROM `table_monitoringoperations` WHERE deleted_at IS NULL AND by_area = 11)');
		$this->db->where('table_shiftoperations.id IN (SELECT ref_id FROM `table_romoperations` WHERE deleted_at IS NULL AND time_out IS NOT NULL)');
		$this->db->where('table_shiftoperations.date', $result['date']);
		return $this->db->get();
	}

	public function data_shift_operation_to_monitoring_65($id = 1)
	{
		$this->db->from('table_shiftoperations');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function monitoring_operations_65_standby($code = '')
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
		$this->db->where('table_monitoringoperations.by_area', 11);
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

	public function data_monitoring_operations_65_standby($id)
	{	
		$this->db->select('table_monitoringoperations.*, cargo.description as color');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function monitoring_operations_69($code ='')
	{
		$result = get_date_shift();
		$this->db->select('table_monitoringoperations.*, cargo.description as color, a.csa, a.time, c.register,IF(table_monitoringoperations.position = \'K\', \'Kosongan\',b.cargo) as cargo_awal, b.remark as remark_awal');
		$this->db->from('table_monitoringoperations');
		$this->db->join('(SELECT table_shiftos.* FROM (SELECT MAX(id) as id FROM `table_shiftos` GROUP BY no_id) as a LEFT JOIN table_shiftos ON table_shiftos.id = a.id) as a','table_monitoringoperations.cn_unit = a.no_id','LEFT');		
		$this->db->join('(SELECT table_settingunit.* FROM (SELECT MAX(id) as id FROM `table_settingunit` GROUP BY unit_id) as c LEFT JOIN table_settingunit ON table_settingunit.id = c.id) as c',' table_monitoringoperations.cn_unit = c.unit_id','LEFT');
		$this->db->join('(SELECT table_shiftoperations.* FROM (SELECT MAX(id) as id FROM `table_shiftoperations` WHERE date = \''.$result['date'].'\' GROUP BY cn_unit) as a LEFT JOIN table_shiftoperations ON table_shiftoperations.id = a.id) as b','table_monitoringoperations.cn_unit = b.cn_unit','LEFT');
		$this->db->join('table_enum as cargo','b.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.by_area', 12);
		$this->db->where('DATE(table_monitoringoperations.time_in)', $result['date']);
		$this->db->where('table_monitoringoperations.deleted_at IS NULL');

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
		$this->db->group_by('table_monitoringoperations.id');
		return $this->db->get();
	}

	public function monitoring_muatan($time_passing, $by_area = '', $date = '')
	{
		$result 			= get_date_shift();
		$date = $date != '' ? $date : $result['date'];
		$src = "";
		if ($by_area) {
			$src .= " AND by_area = '$by_area'";
		}
		// $by_area			= $this->session->userdata('area');
		$this->db->select('monitoring.*, table_enum.description as color');
		$this->db->from('(SELECT * FROM `table_monitoringoperations` 
						  WHERE table_monitoringoperations.deleted_at IS NULL AND DATE( table_monitoringoperations.time_in ) = \''.$date.'\' '.$src.') as monitoring');	
		// $this->db->from('(SELECT MAX(id) as id FROM table_monitoringoperations GROUP BY ref_id) as a');
		// $this->db->join('table_monitoringoperations','a.id = table_monitoringoperations.id','LEFT');
		$this->db->join('table_shiftoperations','monitoring.ref_id = table_shiftoperations.id','LEFT');
		$this->db->join('table_enum','monitoring.cargo = table_enum.name AND table_enum.type = \'cargo_muatan\'','LEFT');
		// $this->db->where('table_shiftoperations.date', );
		$this->db->where('HOUR(monitoring.time_passing)', $time_passing);
		// $this->db->where('table_monitoringoperations.by_area', $by_area);
		// if ($by_area) {
		// 	$this->db->where('table_monitoringoperations.by_area', $by_area);
		// }
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
			LEFT JOIN table_monitoringoperations ON a.id = table_monitoringoperations.id where table_monitoringoperations.by_area = 10) as a ON a.ref_id = table_shiftoperations.id
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
		LEFT JOIN table_monitoringoperations ON a.id = table_monitoringoperations.id where table_monitoringoperations.by_area = 10 ) as a ON a.ref_id = table_shiftoperations.id
		) as c', 'b.date = c.date AND c.position = \'M\' AND c.time_out IS NOT NULL', 'LEFT');


		$this->db->join('table_statuspassing', 'a.date = table_statuspassing.date AND b.shift = table_statuspassing.shift', 'LEFT');
		// $this->db->where('table_supplaypassing.date',$result['date']);

		// $this->db->where('table_supplaypassing.shift',$result['shift']);
		// $this->db->where('table_supplaypassing.deleted_at',NULL);
		$this->db->group_by('a.jam');
		return $this->db->get();
	}



}