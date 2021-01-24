<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Supplay_passing_model extends CI_Model
{
	public function show_data()
	{
		
		$result = get_date_shift();

		$this->db->select('table_supplaypassing.*,table_enum.name as rom_spp, cargo.description as color');
		$this->db->from('table_supplaypassing');
		$this->db->join('table_enum','table_supplaypassing.rom = table_enum.code','LEFT');
		$this->db->join('table_enum as cargo','table_supplaypassing.material = cargo.name','LEFT');
		$this->db->where('table_supplaypassing.date',$result['date']);
		$this->db->where('table_supplaypassing.shift',$result['shift']);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		// $this->db->group_by('table_supplaypassing.material');
		$this->db->order_by('table_supplaypassing.id');
		return $this->db->get();
	}



// 	public function monitoring_data_rom_dispatch($date, $shift, $by_rom)
// 	{
// 		if ($shift == 1) {
// 			$hour = 6;
// 		} else {
// 			$hour = 18;
// 		}

// 		$sel_spp = "'spp' as table_,";
// 		$sel_ops = "'ops' as table_,";
// 		for ($a = 1, $i=$hour; $i < ($hour+12) ; $i++, $a++) { 
// 			$sel_spp .= 'MAX(jam_'.$a.') as plan_' . $i . ', MAX(IF(a.hour = '.$i.', a.total, 0)) as actual_' .$i . ',';
// 			$sel_ops .= 'MAX(IF( HOUR( DATE_ADD(CONCAT(table_shiftoperations.date, \' \', table_shiftoperations.time), INTERVAL 2 HOUR) ) = '.$i.', 1, 0)) as plan_' .$i . ', \'0\' as actual_' .$i . ',';
// 		}

// 		$sel_spp = rtrim($sel_spp, ',');
// 		$sel_ops = rtrim($sel_ops, ',');

// 		return $this->db->query("

// 			SELECT a.*, table_quality.cv_ar FROM (
// 			SELECT `table_supplaypassing`.material, ".$sel_spp." FROM `table_supplaypassing`
// 			LEFT JOIN (SELECT table_shiftoperations.cargo, COUNT(*) as total, HOUR(
// 			DATE_ADD(CONCAT(table_shiftoperations.date, ' ', table_shiftoperations.time), INTERVAL 2 HOUR)
// 			) as hour FROM `table_shiftoperations` 
// 			LEFT JOIN table_enum ON table_shiftoperations.to_rom = table_enum.id 
// 			WHERE `table_shiftoperations`.`deleted_at` IS NULL AND `table_enum`.`code` = '{$by_rom}' AND `table_shiftoperations`.`date` = '{$date}' 
// 			GROUP BY HOUR(time),cargo) as a ON table_supplaypassing.material = a.cargo			
// 			WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL
// 			UNION ALL
// 			SELECT cargo as material, ".$sel_ops." FROM `table_shiftoperations` 
// 			LEFT JOIN table_enum ON table_shiftoperations.to_rom = table_enum.id 
// 			WHERE `table_shiftoperations`.`deleted_at` IS NULL AND `table_enum`.`code` = '{$by_rom}' AND `table_shiftoperations`.`date` = '{$date}' AND cargo NOT IN (SELECT `table_supplaypassing`.material FROM `table_supplaypassing` WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL) 
// 			) as a 
// 			LEFT JOIN table_quality ON a.material = table_quality.series AND table_quality.date = '{$date}' 
// 			where a.material IS NOT NULL
// 			");


// // 			SELECT `table_supplaypassing`.material, ".$sel_spp." FROM `table_supplaypassing`
// // 			WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL
// // UNION ALL
// // SELECT cargo, ".$sel_ops." FROM `table_shiftoperations` LEFT JOIN table_enum ON table_shiftoperations.to_rom = table_enum.id WHERE `table_shiftoperations`.`deleted_at` IS NULL AND `table_enum`.`code` = '{$by_rom}' AND `table_shiftoperations`.`date` = '{$date}' AND cargo NOT IN (SELECT `table_supplaypassing`.material FROM `table_supplaypassing` WHERE `table_supplaypassing`.`date` = '{$date}' AND `table_supplaypassing`.`shift` = {$shift} AND `table_supplaypassing`.`rom` = '{$by_rom}' AND `table_supplaypassing`.`deleted_at` IS NULL 

// // $this->db->get();
// 	}

	public function monitoring_data_rom_dispatch($date, $shift, $by_rom)
	{
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

}
?>