<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Rom_operations extends CI_Model
{
	private $table = 'table_romoperations';
	
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