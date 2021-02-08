<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rom extends CI_Model {	
	
	public function rom_monitoring_shift_operations($by_rom) 
	{
		$result 		= get_date_shift();	
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as rom_name, a.time_in, a.time_out');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->join('(SELECT table_romoperations.id, time_in, time_out, ref_id FROM (SELECT MAX(id) as id FROM table_romoperations WHERE deleted_at IS NULL GROUP BY ref_id) as a
			LEFT JOIN table_romoperations ON table_romoperations.id = a.id
			WHERE deleted_at IS NULL) as a','table_shiftoperations.id = a.ref_id ','LEFT');
			if ($by_rom) {
				$this->db->where('table_shiftoperations.to_rom', $by_rom);
			}			
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.date',$result['date']);
		$this->db->where('table_shiftoperations.position', 'K');
		$this->db->where('table_shiftoperations.cn_unit NOT IN (SELECT table_monitoringoperations.cn_unit FROM (SELECT MAX(id) as id FROM `table_monitoringoperations` WHERE DATE(time_in) = \''.$result['date'].'\' GROUP BY cn_unit) as a LEFT JOIN table_monitoringoperations ON table_monitoringoperations.id = a.id
 			WHERE deleted_at IS NULL AND  time_out IS NULL) ', NULL, FALSE);
		$this->db->order_by('table_shiftoperations.id asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function report_rom_monitoring_shift_operations($date,$by_rom)
	{
		// $result 	= get_date_shift();	
		// $date 		= $date == '' ? $result['date'] : $date;
		// $by_rom 	= $by_rom == '' ? $by_rom;
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as rom_name, a.time_in, a.time_out');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->join('(SELECT table_romoperations.id, time_in, time_out, ref_id FROM (SELECT MAX(id) as id FROM table_romoperations WHERE deleted_at IS NULL GROUP BY ref_id) as a
			LEFT JOIN table_romoperations ON table_romoperations.id = a.id
			WHERE deleted_at IS NULL) as a','table_shiftoperations.id = a.ref_id ','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		if ($by_rom) {
			$this->db->where('table_shiftoperations.to_rom', $by_rom);
		}
		
		$this->db->where('table_shiftoperations.date',$date);
		$this->db->order_by('table_shiftoperations.id asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function detail_rom_operations($id = 1)
	{
		$this->db->from('table_romoperations');
		$this->db->where('table_romoperations.deleted_at', NULL);
		$this->db->where('table_romoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function detail_ref_rom_operations($id = 1)
	{
		$this->db->from('table_romoperations');
		$this->db->where('table_romoperations.deleted_at', NULL);
		$this->db->where('table_romoperations.ref_id = \''.$id.'\'');
		return $this->db->get();
	}
	
}
?>