<?php defined('BASEPATH') or exit('No direct script access allowed'); 

class Administrator extends CI_Model
{	
	public function detail_user()
	{
		$this->db->select('table_users.*, table_enum.name  as level');
		$this->db->from('table_users');
		$this->db->join('table_enum', 'table_users.level  = table_enum.id', 'LEFT');
		$this->db->where('table_users.deleted_at is NULL');
		$this->db->order_by('table_users.username asc');
		return $this->db->get();
	}
	
}
?>