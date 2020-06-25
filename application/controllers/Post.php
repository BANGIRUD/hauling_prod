<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	function __construct() {
		header('Content-type: application/json');
		parent::__construct();
	}

	public function status_passing() {
		$by_area		= $this->session->userdata('area');
		$by_user		= $this->session->userdata('id');

		$this->load->model('Status_passing_model', 'passing');
		$date = addslashes($this->input->post('date'));
		$shift = addslashes($this->input->post('shift'));
		$time = addslashes($this->input->post('time'));
		$status = addslashes($this->input->post('status'));

		$sql = $this->passing->search_status_supplay($date, $shift, $time);
		if($sql->num_rows() > 0 ){
			$rowku = $sql->row_array();
			$id = $rowku['id'];
			$data = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'date' => $date,
				'time' => date('H:00:00', strtotime($time.':00')),
				'shift' => $shift,
				'status' => $status,
				'by_area' => $by_area,
				'by_user' => $by_user
			);


			$this->passing->update_status_supplay($id, $data);
		} else {
			$data = array(
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'date' => $date,
				'time' => date('H:00:00', strtotime($time.':00')),
				'shift' => $shift,
				'status' => $status,
				'by_area' => $by_area,
				'by_user' => $by_user
			);


			$this->passing->save_status_supplay($data);

		}
	}

	public function keterangan_status_passing() {
		$by_area		= $this->session->userdata('area');
		$by_user		= $this->session->userdata('id');

		$this->load->model('Status_passing_model', 'passing');
		$date = addslashes($this->input->post('date'));
		$shift = addslashes($this->input->post('shift'));
		$time = addslashes($this->input->post('time'));
		$keterangan = addslashes($this->input->post('keterangan'));

		$sql = $this->passing->search_status_supplay($date, $shift, $time);
		if($sql->num_rows() > 0 ){
			$rowku = $sql->row_array();
			$id = $rowku['id'];
			$data = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'date' => $date,
				'time' => date('H:00:00', strtotime($time.':00')),
				'shift' => $shift,
				'keterangan' => $keterangan,
				'by_area' => $by_area,
				'by_user' => $by_user
			);


			$this->passing->update_status_supplay($id, $data);
		} else {
			$data = array(
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'date' => $date,
				'time' => date('H:00:00', strtotime($time.':00')),
				'shift' => $shift,
				'keterangan' => $keterangan,
				'by_area' => $by_area,
				'by_user' => $by_user
			);


			$this->passing->save_status_supplay($data);

		}
	}
}