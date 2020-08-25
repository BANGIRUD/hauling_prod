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
}
?>