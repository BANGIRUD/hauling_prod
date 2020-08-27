<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/

class Shift_operations extends CI_Model
{
	private $table = 'table_shiftoperations';

	public function daily_record_production()
	{
		$result 		= get_date_shift();	
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


	public function detail_shift_operations($id = 1)
	{
		$this->db->from('table_shiftoperations');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function monitoring_shift_operations($position = 'K',$by_area = "")
	{

		// $by_area = $this->session->userdata('area');
		$level 	 = $this->session->userdata('level');
		if($by_area) {
			$by_area = " and a.by_area = " . $by_area;
		}
		$result 		= get_date_shift();	
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as rom_name, a.time_in, a.time_out, a.code_stby');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->join('(SELECT table_monitoringoperations.* FROM (SELECT MAX(id) as id FROM table_monitoringoperations WHERE deleted_at IS NULL GROUP BY ref_id) as a
			LEFT JOIN table_monitoringoperations ON table_monitoringoperations.id = a.id
			WHERE deleted_at IS NULL) as a','table_shiftoperations.id = a.ref_id AND table_shiftoperations.position = a.position '.$by_area,'LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.date',$result['date']);
		$this->db->where('table_shiftoperations.position',$position);
		$this->db->order_by('time_out asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

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
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.date',$result['date']);
		$this->db->where('table_shiftoperations.position', 'K');
		$this->db->order_by('table_shiftoperations.id asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function report_rom_monitoring_shift_operations($by_rom)
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
		$this->db->order_by('table_shiftoperations.id asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}
}
?>