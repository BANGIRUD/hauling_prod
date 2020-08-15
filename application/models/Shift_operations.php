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
		$this->db->select('table_shiftoperations.*, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time, table_enum.code as loc_code, cargo.description as color, rom.name as rom_name , table_equipment.no_unit as unit, area.name as area_name');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum','table_shiftoperations.location = table_enum.id','LEFT');	
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.by_rom = rom.id','LEFT');
		$this->db->join('table_enum as area','table_shiftoperations.by_area = area.id','LEFT');
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.no_id', 'LEFT');	
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_equipment','table_shiftoperations.cn_unit = table_equipment.unit_id','LEFT');		
		$this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = \''.$result['date'].'\'');
		// $this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = "2020-05-18"');
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

	public function monitoring_pos_pantau($by_area, $position, $code = '')
	{
		$result 		= get_date_shift();	
		$this->db->select('table_shiftoperations.*, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time, table_enum.code as loc_code, cargo.description as color, rom.name as rom_name , table_equipment.no_unit as unit, area.name as area_name');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum','table_shiftoperations.location = table_enum.id','LEFT');	
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.by_rom = rom.id','LEFT');
		$this->db->join('table_enum as area','table_shiftoperations.by_area = area.id','LEFT');
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.no_id', 'LEFT');	
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_equipment','table_shiftoperations.cn_unit = table_equipment.unit_id','LEFT');		
		$this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = \''.$result['date'].'\'');
		// $this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = "2020-05-18"');
		// if ($position != "K") {
		// 	$this->db->where('table_shiftoperations.by_area', $by_area);
		// }
		$this->db->where('table_shiftoperations.position', $position);
		// $this->db->where('table_shiftoperations.code_stby', $code);
		$this->db->order_by('table_shiftoperations.by_ordered asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();

	}

	public function monitoring_pos_timbangan($by_area, $position, $code = '')
	{
		$result 		= get_date_shift();	
		$this->db->select('table_shiftoperations.*, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time, table_enum.code as loc_code, cargo.description as color, rom.name as rom_name , table_equipment.no_unit as unit, area.name as area_name');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum','table_shiftoperations.location = table_enum.id','LEFT');	
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.by_rom = rom.id','LEFT');
		$this->db->join('table_enum as area','table_shiftoperations.by_area = area.id','LEFT');
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.no_id', 'LEFT');	
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_equipment','table_shiftoperations.cn_unit = table_equipment.unit_id','LEFT');		
		$this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = \''.$result['date'].'\'');
		// $this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = "2020-05-18"');
		if ($by_area) {
			$this->db->where('table_shiftoperations.by_area', $by_area);
		}
		$this->db->where('table_shiftoperations.position', $position);
		if ($code) {
			$this->db->where('table_shiftoperations.code_stby', $code);
		}
		$this->db->order_by('table_shiftoperations.by_ordered asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();

	}

	public function monitoring_pos_rom($by_rom,$code='')
	{
		$result 		= get_date_shift();	
		$this->db->select('table_shiftoperations.*, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time, table_enum.code as loc_code, cargo.description as color, rom.name as rom_name , table_equipment.no_unit as unit, area.name as area_name');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum','table_shiftoperations.location = table_enum.id','LEFT');	
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.by_rom = rom.id','LEFT');
		$this->db->join('table_enum as area','table_shiftoperations.by_area = area.id','LEFT');
		$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.no_id', 'LEFT');	
		$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
		$this->db->join('table_equipment','table_shiftoperations.cn_unit = table_equipment.unit_id','LEFT');		
		$this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = \''.$result['date'].'\'');
		// $this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = "2020-05-18"');
		if ($by_rom) {
			$this->db->where('table_shiftoperations.by_rom', $by_rom);
		}
		// $this->db->where('table_shiftoperations.position', $code);
		$this->db->order_by('table_shiftoperations.by_ordered asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();

	}


}
?>