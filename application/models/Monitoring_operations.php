<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Monitoring_operations extends CI_Model
{
	private $table = 'table_monitoringoperations';

	public function detail_monitoring_operations($id = 1)
	{
		$this->db->from('table_monitoringoperations');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		$this->db->where('table_monitoringoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function detail_ref_monitoring_operations($id = 1)
	{
		$this->db->from('table_monitoringoperations');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		$this->db->where('table_monitoringoperations.ref_id = \''.$id.'\'');
		return $this->db->get();
	}

	public function detail_monitoring_operations_standby($by_area, $code='')
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

	public function monitoring_operations_34_muatan($position = 'M')
	{
		// $this->db->select('table_monitoringoperations.*, cargo.description as color');
		// $this->db->from('table_monitoringoperations');
		// $this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		// $this->db->where('table_monitoringoperations.deleted_at', NULL);
		// return $this->db->get();
		$result 		= get_date_shift();
		$this->db->select('table_shiftoperations.*, cargo.description as color, rom.name as rom_name, a.time_in, a.time_out, a.code_stby');
		$this->db->from('table_shiftoperations');
		$this->db->join('table_enum as cargo','table_shiftoperations.cargo = cargo.name','LEFT');
		$this->db->join('table_enum as rom','table_shiftoperations.to_rom = rom.id','LEFT');
		$this->db->join('(SELECT table_monitoringoperations.* FROM (SELECT MAX(id) as id FROM table_monitoringoperations WHERE deleted_at IS NULL GROUP BY ref_id) as a
			LEFT JOIN table_monitoringoperations ON table_monitoringoperations.id = a.id
			WHERE deleted_at IS NULL) as a','table_shiftoperations.id = a.ref_id AND table_shiftoperations.position = a.position ','LEFT');
		$this->db->where('table_shiftoperations.deleted_at', NULL);
		$this->db->where('table_shiftoperations.date',$result['date']);
		$this->db->where('table_shiftoperations.position',$position);
		$this->db->order_by('time_out asc');
		$this->db->group_by('table_shiftoperations.id');
		return $this->db->get();
	}

	public function monitoring_operations_34_standby()
	{	
		$this->db->select('table_monitoringoperations.*, cargo.description as color');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		return $this->db->get();
	}

	public function detail_operations_34_standby($id)
	{	
		$this->db->select('table_monitoringoperations.*, cargo.description as color');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function monitoring_operations_65_muatan()
	{
		$this->db->select('table_monitoringoperations.*, cargo.description as color');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		return $this->db->get();
	}

	public function monitoring_operations_65_standby()
	{
		$this->db->select('table_monitoringoperations.*, cargo.description as color');
		$this->db->from('table_monitoringoperations');
		$this->db->join('table_enum as cargo','table_monitoringoperations.cargo = cargo.name','LEFT');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		return $this->db->get();
	}

	public function monitoring_operations_69()
	{
		$this->db->from('table_monitoringoperations');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		$this->db->where('table_monitoringoperations.ref_id = \''.$id.'\'');
		return $this->db->get();
	}

	public function detail_monitoring_operations_34($id = 1)
	{
		$this->db->from('table_monitoringoperations');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		$this->db->where('table_monitoringoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

	public function detail_monitoring_operations_65($id = 1)
	{
		$this->db->from('table_monitoringoperations');
		$this->db->where('table_monitoringoperations.deleted_at', NULL);
		$this->db->where('table_monitoringoperations.id = \''.$id.'\'');
		return $this->db->get();
	}

}
?>