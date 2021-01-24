<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dispatching extends CI_Model 
{

	public function record_production()
	{
		$result	= get_date_shift();	
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as rom_name');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.date',$result['date']);
		$this->db->order_by('table_shiftoperations.id asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function edit_record_production($id = 1)
	{
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as rom_name');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->order_by('table_shiftoperations.id asc');
		$this->db->where('table_shiftoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function history_record_prod($unit) {	
		$result = get_date_shift();
		$date 	= $result['date'];
		$this->db->select('table_shiftoperations.*,cargo.description as color,os.csa, os.time as csa_time');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('(SELECT table_shiftos.* FROM (SELECT MAX(id) as id FROM `table_shiftos` WHERE deleted_at IS NULL GROUP BY no_id) as a LEFT JOIN table_shiftos ON a.id = table_shiftos.id) os','table_shiftoperations.cn_unit = os.no_id','LEFT');	
		$this->db->where('table_shiftoperations.deleted_at', NULL);		
		$this->db->where('table_shiftoperations.date',$result['date']);
		$this->db->where('table_shiftoperations.cn_unit', $unit);
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function monitoring_operation_rom_data($date, $time, $by_rom) {		
		$this->db->select('table_shiftoperations.*, cargo.description as color,a.register, b.csa');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('(SELECT table_settingunit.* FROM (SELECT MAX(id) as id FROM `table_settingunit` group by unit_id ) AS a LEFT JOIN table_settingunit ON table_settingunit.id = a.id) as a','a.unit_id = table_shiftoperations.cn_unit','LEFT');
		$this->db->join('(SELECT table_shiftos.* FROM (SELECT MAX(id) as id FROM `table_shiftos` GROUP BY no_unit) as a LEFT JOIN table_shiftos ON a.id = table_shiftos.id) as b','b.no_id = table_shiftoperations.cn_unit','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.to_rom', $by_rom);
		$this->db->where('DATE(DATE_ADD(CONCAT(table_shiftoperations.date, \' \', table_shiftoperations.time), INTERVAL 2 HOUR)) = \''.$date.'\'', NULL, false);
		$this->db->where('HOUR(CONCAT(table_shiftoperations.date, \' \', table_shiftoperations.time)) = \''.$time.'\'', NULL, false);
		// $this->db->group_by('table_shiftoperations.to_rom');	
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

	public function monitoring_data_rom_dispatch($date, $shift, $by_rom) {
		if ($shift == 1) {
			$hour = 6;
		} else {
			$hour = 18;
		}

		$sel_spp = "'spp' as table_,";
		$sel_ops = "'ops' as table_,";
		for ($a = 1, $i=$hour; $i < ($hour+12) ; $i++, $a++) { 
			$sel_spp .= 'MAX(jam_'.$a.') as plan_' . $i . ', MAX(IF(a.hour = '.$i.', a.total, 0)) as actual_' .$i . ',';
			$sel_ops .= '\'0\' as plan_' .$i . ', SUM(IF( HOUR( DATE_ADD(CONCAT(table_shiftoperations.date, \' \', table_shiftoperations.time), INTERVAL 2 HOUR) ) = '.$i.', 1, 0)) as actual_' .$i . ',';
		}

		$sel_spp = rtrim($sel_spp, ',');
		$sel_ops = rtrim($sel_ops, ',');

		return $this->db->query("

			SELECT a.*, table_quality.cv_ar FROM (
			SELECT `table_supplaypassing`.material, ".$sel_spp." FROM `table_supplaypassing`
			LEFT JOIN (SELECT table_shiftoperations.cargo, COUNT(*) as total, HOUR(
			DATE_ADD(CONCAT(table_shiftoperations.date, ' ', table_shiftoperations.time), INTERVAL 2 HOUR)
			) as hour FROM `table_shiftoperations` 
			LEFT JOIN table_enum ON table_shiftoperations.to_rom = table_enum.id 
			WHERE `table_shiftoperations`.`deleted_at` IS NULL AND `table_enum`.`code` = '{$by_rom}' AND `table_shiftoperations`.`date` = '{$date}' 
			GROUP BY HOUR(time),cargo) as a ON table_supplaypassing.material = a.cargo			
			WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL
			UNION ALL
			SELECT cargo as material, ".$sel_ops." FROM `table_shiftoperations` 
			LEFT JOIN table_enum ON table_shiftoperations.to_rom = table_enum.id 
			WHERE `table_shiftoperations`.`deleted_at` IS NULL AND `table_enum`.`code` = '{$by_rom}' AND `table_shiftoperations`.`date` = '{$date}' AND cargo NOT IN (SELECT `table_supplaypassing`.material FROM `table_supplaypassing` WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL) 
			) as a 
			LEFT JOIN table_quality ON a.material = table_quality.series AND table_quality.date = '{$date}' 
			where a.material IS NOT NULL
			");
			// 			SELECT `table_supplaypassing`.material, ".$sel_spp." FROM `table_supplaypassing`
			// 			WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL
			// UNION ALL
			// SELECT cargo, ".$sel_ops." FROM `table_shiftoperations` LEFT JOIN table_enum ON table_shiftoperations.to_rom = table_enum.id WHERE `table_shiftoperations`.`deleted_at` IS NULL AND `table_enum`.`code` = '{$by_rom}' AND `table_shiftoperations`.`date` = '{$date}' AND cargo NOT IN (SELECT `table_supplaypassing`.material FROM `table_supplaypassing` WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL 

			// $this->db->get();
	}

	public function achievement_seam_series($date, $shift) {		
		$result = get_date_shift();
		$date 	= $date == '' ? $result['date'] : $date;
		$shift 	= $shift == '' ? $result['shift'] : $shift;
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

	public function achievement_rom_rtk($by_rom) {
		$result = get_date_shift();
		$date 	= $result['date'];
		$shift 	= $result['shift'];
			if ($result['shift'] == 1) {
				$hour = 6;
			} else {
				$hour = 18;
			}
			for ($a = 1, $i=$hour; $i < ($hour+12) ; $i++, $a++) { 
				$this->db->select('SUM(IF(HOUR(DATE_ADD(CONCAT(table_shiftoperations.date, \' \', table_shiftoperations.time), INTERVAL 2 HOUR)) = '.$i.', 1, 0)) as kosongan_' . $a);
			}
		$this->db->from('table_shiftoperations');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.to_rom', $by_rom);
		$this->db->where('DATE(DATE_ADD(CONCAT(table_shiftoperations.date, \' \', table_shiftoperations.time), INTERVAL 2 HOUR)) = \''.$result['date'].'\'', NULL, false);
		$this->db->group_by('table_shiftoperations.to_rom');
		return $this->db->get();
	}
}
?>