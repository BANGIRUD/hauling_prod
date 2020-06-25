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

		$this->db->select('table_supplaypassing.*');
		$this->db->from('table_supplaypassing');
		$this->db->where('table_supplaypassing.date',$result['date']);

		$this->db->where('table_supplaypassing.shift',$result['shift']);
		$this->db->where('table_supplaypassing.deleted_at',NULL);
		return $this->db->get();
	}

}
?>