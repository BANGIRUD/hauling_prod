<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct() {
		parent::__construct();	
		// $this->auth['area']			= $this->session->userdata('area');
		// $this->auth['id']			= $this->session->userdata('id');
		// if (!$this->auth['id']) {
		// 	redirect(base_url('Auth'));
		// }
	}

	// public function shift_operations()
	// {
	// 	print_r($_POST);
	// 	$result		= get_date_shift();
	// 	$this->db->where('id', $id);
	// 	$this->db->update('table_shiftoperations', 
	// 		array(
	// 			'operation' => $val, 
	// 			'time_out' => $time_out
	// 		)
	// 	);
	// 	$this->Crud->update('atable_shiftoperations', array('id' => $this->input->post('id')), array(
	// 					'updated_at' 		=> date('Y-m-d H:i:s'),
	// 					'unit_id'			=> $this->input->post('unit_id'),
	// 					'ellipse'			=> $this->input->post('ellipse'),
	// 					'model'				=> $this->input->post('model'),
	// 					'chassis_number'	=> $this->input->post('chassis_number'),
	// 					'brand'				=> $this->input->post('brand'),
	// 					'product'			=> $this->input->post('product'),
	// 					'engine_model'		=> $this->input->post('engine'),
	// 					'engine_number'		=> $this->input->post('engine_number'),
	// 					'delivery'			=> $this->input->post('delivery'),
	// 					'rpm'				=> $this->input->post('rpm'),
	// 					'responsibility'	=> $this->input->post('responsibility'),
	// 					'fix_trailer'		=> $this->input->post('fix_trailer'),
	// 					'status'			=> $this->input->post('status'),
	// 					'rfid'				=> $this->input->post('rfid'),
	// 					'gpsid'				=> $this->input->post('gpsid'),
	// 					'section'			=> $this->input->post('section'),
	// 					'by_user'			=> $by_user
	// 				));
		
	// }

	public function ready_to_operation($id, $val)
	{
		$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		$this->db->update('table_shiftoperations', array('operation' => $val, 'time_out' => $time_out ));
	}

	public function password() {
		$username_ 		= $this->session->userdata('username');
		$oldpass 		= trim($this->input->post('oldpass'));
		$newpass 		= trim($this->input->post('newpass'));
		$repass 		= trim($this->input->post('repass'));
		$src = $this->Crud->search('table_users', array('username' => $username_))->num_rows();
		if ($src > 0) {
			if ($newpass == $repass) {
				$data = $this->Crud->search('table_users', array('username' => $username_))->row_array();
				if (password_verify($oldpass, $data['password'])) {
					$data = array(
						'password' => password_hash($newpass, PASSWORD_DEFAULT)
					);
					$this->Crud->update('table_users', array('username' => $username_), $data);
					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Success!</h4>
		                Hello <b>"' . $name . '"</b> your profile is up to date now!
		              </div>');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
			                Password wrong!
			                </div>');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
		                Password does not match!
		              </div>');
				
			}
		}
		
		redirect(base_url('Dash/profile'));
	}

	public function raw_material()
	{
		$by_user				= $this->session->userdata('id');

		$id 					= trim($this->input->post('id'));
		$name 					= trim($this->input->post('name'));
		$category_description 	= trim($this->input->post('category_description'));

		$src 	= $this->Crud->search('enum', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at'			=> date('Y-m-d H:i:s'), 
				'name' 					=> $name, 
				'category_description' 	=> $category_description,
				'by_user' 				=> $by_user
			);
			$this->Crud->update('enum', array('id' => $id),$data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Success!</h4>
		                Succes <b>"' . $name . '"</b> your material is up to date now!
		              </div>');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Error!</h4>
		                Failed <b>"' . $name . '"</b> your material is error!!!!
		              </div>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	

	public function edit_shift_operation()
	{
		// print_r($_POST);
		$by_user				= $this->session->userdata('id');
		$by_area				= $this->session->userdata('area') != '' ? $this->session->userdata('area') : trim($this->input->post('area'));
		
		$id 					= trim($this->input->post('id'));
		$date 					= trim( date('Y-m-d', strtotime($this->input->post('date'))) );
		$shift 					= trim($this->input->post('shift'));
		$unit 					= trim($this->input->post('unit'));
		$posisi 				= trim($this->input->post('position'));
		$cargo 					= trim($this->input->post('cargo_muatan'));
		$code_stby				= trim($this->input->post('code_standby'));
		$date_in	 			= date('Y-m-d H:i', strtotime($this->input->post('date_in').' '.$this->input->post('time_in')));
		$date_out	 			= date('Y-m-d H:i', strtotime($this->input->post('date_out').' '.$this->input->post('time_out')));
		$time_passing			= date('H:i', strtotime( $this->input->post('time_passing').':00' ));
		$remark 				= trim($this->input->post('remark'));

		$src 	= $this->Crud->search('table_shiftoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at'		=> date('Y-m-d H:i:s'),
				'deleted_at'		=> NULL,
				'date'				=> $date,
				'shift'				=> $shift,
				'time_in'			=> $date_in,
				'time_out'			=> $date_out,
				'location'			=> $by_area,
				'cn_unit'			=> $unit,
				'position'			=> $posisi,
				'cargo'				=> $cargo,
				'code_stby'			=> $code_stby,
				'time_passing'		=> $time_passing,
				'remark'			=> $remark,
				'by_area'			=> $by_area,
				'by_user'			=> $by_user
			);
			$this->Crud->update('table_shiftoperations', array('id' => $id),$data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
		        Data telah berhasil di edit!.
		      </div>');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-check"></i> Error!</h4>
		        Check kembali data anda!.
		      </div>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function edit_shift_operation_ordered($id, $position, $cursor)
	{
		
		$position = $cursor == 'down' ? $position+1 : $position-1;

		$second_position = $cursor == 'down' ? $position-1 : $position+1;



		$data = array(
			'by_ordered' => $position
		);

		$second_data = array(
			'by_ordered' => $second_position
		);
		$this->Crud->update('table_shiftoperations', array('by_ordered' => $position),$second_data);
		$this->Crud->update('table_shiftoperations', array('id' => $id),$data);
		redirect($_SERVER['HTTP_REFERER']);
	}

}