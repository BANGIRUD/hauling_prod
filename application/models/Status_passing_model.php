<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Status_passing_model extends CI_Model
{
	public function search_status_supplay($date, $shift, $time)
	{
		$this->db->from('table_statuspassing');
		$this->db->where('table_statuspassing.date',$date);
		$this->db->where('table_statuspassing.shift',$shift);
		$this->db->where('HOUR(table_statuspassing.time)',$time);
		$this->db->where('table_statuspassing.deleted_at',NULL);
		return $this->db->get();
	}

	public function save_status_supplay($data)
	{
		return $this->db->insert('table_statuspassing', $data);
	}

	public function update_status_supplay($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('table_statuspassing', $data);
	}

}
?>