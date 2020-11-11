<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->by_area			= $this->session->userdata('area');
		$this->by_user			= $this->session->userdata('id');
		if (!$this->by_user) {
			redirect(base_url('Auth'));
		}
	}

	public function cargo_muatan()
	{
		$by_user				= $this->session->userdata('id');

		$id 					= trim($this->input->post('id'));
		$name 					= trim($this->input->post('name'));
		$description 			= trim($this->input->post('description'));

		$src 	= $this->Crud->search('table_enum', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at'	=> date('Y-m-d H:i:s'), 
				'name' 			=> $name, 
				'description' 	=> $description,
				'by_user' 		=> $by_user
			);
			$this->Crud->update('table_enum', array('id' => $id),$data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Success!</h4>
		                Succes <b>"' . $name . '"</b> your cargo is up to date now!
		              </div>');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Error!</h4>
		                Failed <b>"' . $name . '"</b> your cargo is error!!!!
		              </div>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function rom()
	{
		$by_user				= $this->session->userdata('id');

		$id 					= trim($this->input->post('id'));
		$name 					= trim($this->input->post('name'));
		$description 			= trim($this->input->post('description'));

		$src 	= $this->Crud->search('table_enum', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at'	=> date('Y-m-d H:i:s'), 
				'name' 			=> $name, 
				'description' 	=> $description,
				'by_user' 		=> $by_user
			);
			$this->Crud->update('table_enum', array('id' => $id),$data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Success!</h4>
		                Succes <b>"' . $name . '"</b> your cargo is up to date now!
		              </div>');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Error!</h4>
		                Failed <b>"' . $name . '"</b> your cargo is error!!!!
		              </div>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shift_operation()
	{
		$id 					= trim($this->input->post('id'));
		$unit 					= trim($this->input->post('unit'));
		$cargo 					= trim($this->input->post('cargo_muatan'));
		$rom 					= trim($this->input->post('rom'));
		$datetime				= trim($this->input->post('datetime'));

		$src 	= $this->Crud->search('table_shiftoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'created_at'		=> $datetime,
				'updated_at' 		=> date('Y-m-d H:i:s'),
				'deleted_at' 		=> NULL,
				'cn_unit' 			=> $unit,
				'cargo' 			=> $cargo,
				'to_rom'			=> $rom
			);
			$this->db->where('id', $id);
			$this->db->update('table_shiftoperations',$data);


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

	public function monitoring_operations($id = 1) {
		$this->load->model('Monitoring_operations', 'monitoring');

		$row 					= $this->monitoring->detail_ref_monitoring_operations($id);
		if ($row->num_rows() > 0) {

			$row 					= $row->row_array();
			$time_passing 			= date('i') > 55 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

			$data = array(
				'updated_at' 		=> date('Y-m-d H:i:s'),
				'time_out'			=> date('Y-m-d H:i:s'),
				'time_passing'		=> $time_passing,
			);

			$this->db->where('ref_id', $id);
			$this->db->update('table_monitoringoperations', $data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
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



	public function rom_operations($id = 1) {
		$this->load->model('Rom_operations', 'rom');

		$row 					= $this->rom->detail_ref_rom_operations($id);
		if ($row->num_rows() > 0) {

			$row 					= $row->row_array();
			$time_passing 			= date('i') > 55 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

			$data = array(
				'updated_at' 		=> date('Y-m-d H:i:s'),
				'time_out'			=> date('Y-m-d H:i:s'),
			);

			$this->db->where('ref_id', $id);
			$this->db->update('table_romoperations', $data);

			// UBAH KE MUATAN OTOMATIS

			$data = array(
				'updated_at' 		=> date('Y-m-d H:i:s'),
				'position'			=> "M",
			);
			$this->db->where('id', $id);
			$this->db->update('table_shiftoperations', $data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
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



	public function bypass_monitoring_operations($id = 1) {
		$this->load->model('Shift_operations', 'operations');

		$row 					= $this->operations->detail_shift_operations($id);
		if ($row->num_rows() > 0) {

			$row 					= $row->row_array();
			$time_passing 			= date('i') > 50 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

			$data = array(
				'created_at' 		=> date('Y-m-d H:i:s'),
				'updated_at' 		=> date('Y-m-d H:i:s'),
				'ref_id'			=> $id,
				'deleted_at' 		=> NULL,
				'time_in'			=> date('Y-m-d H:i:s'),
				'time_out'			=> date('Y-m-d H:i:s'),
				'cn_unit' 			=> $row['cn_unit'],
				'position' 			=> $row['position'],
				'cargo'				=> $row['cargo'],
				'code_stby'			=> "L",
				'time_passing'		=> $time_passing,
				'remark'			=> NULL,
				'by_area'			=> $this->by_area,
				'by_user'			=> $this->by_user
			);

			$this->db->insert('table_monitoringoperations', $data);

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-check"></i> Error!</h4>
		        Check kembali data anda!.
		      </div>');
		}

		// redirect($_SERVER['HTTP_REFERER']);
	}

	public function people() {
		$id 			= trim($this->input->post('id'));
		$username 		= trim($this->input->post('username'));
		$name 			= trim($this->input->post('full_name'));
		$description 	= trim($this->input->post('description'));
		$level 			= trim($this->input->post('level'));
		$src 			= $this->Crud->search('table_users', array('id' => $id))->num_rows();
		if ($src > 0) {
			$src = $this->Crud->search('table_enum', array('id' => $level, 'type' => 'level'))->num_rows();
			if ($src > 0) {
				$data = array(
					'updated_at'	=> date('Y-m-d H:i:s'),
					'username' 		=> $username,
					'full_name' 	=> $name,
					'description' 	=> $description,
					'level' 		=> $level,
				);
				$this->Crud->update('table_users', array('id' => $id), $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Success!</h4>
	                <b>"' . $username . '"</b> has been modified!
	              </div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Insert error, please check your data again!
              </div>');				
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not found on database!
              </div>');
		}
	}

	public function reset_password() {
		$id = trim($this->input->post('id'));
		$username = trim($this->input->post('username'));
		$password = password_hash(trim($username), PASSWORD_DEFAULT);
		$src = $this->Crud->search('user', array('id' => $id, 'username' => $username))->num_rows();
		if ($src > 0) {
			$data = array(
				'id' => $id,
				'password' => $password
			);
			$this->Crud->update('user', array('id' => $id), $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <b>"' . $username . '"</b> has been default password!
              </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not found on database!
              </div>');
		}
	}

	public function password() {
		$username_ = $this->session->userdata('username');
		$oldpass = trim($this->input->post('oldpass'));
		$newpass = trim($this->input->post('newpass'));
		$repass = trim($this->input->post('repass'));
		$src = $this->Crud->search('table_users', array('username' => $username_))->num_rows();
		if ($src > 0) {
			if ($newpass == $repass) {
				$data = $this->Crud->search('table_users', array('username' => $username_))->row_array();
				if (password_verify($oldpass, $data['password'])) {
					$data = array(
						'password' => password_hash($newpass, PASSWORD_DEFAULT)
					);
					$this->Crud->update('table_users', array('username' => $username_), $data);
					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade-alert">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Success!</h4>
		                Hello <b>"' . $username_ . '"</b> your profile is up to date now!
		              </div>');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
			                Password wrong!
			                </div>');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
		                Password does not match!
		              </div>');
				
			}
		}
		$this->load->library('user_agent');
		if ($this->agent->is_referral()) {
		    $refer =  $this->agent->referrer();
		} else {
			$refer = "";
		}
		
		redirect(base_url($refer));
	}

	public function ready_to_operation_34($id, $val)
	{
		$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out ));
	}

	public function ready_to_operation_65($id, $val)
	{
		$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out ));
	}
	
}