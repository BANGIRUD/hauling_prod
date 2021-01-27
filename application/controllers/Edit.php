<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->by_level 		= $this->session->userdata('level'); 
		$this->by_area			= $this->session->userdata('area');
		$this->by_user			= $this->session->userdata('id');
		if (!$this->by_user) {
			redirect(base_url('Auth'));
		}
	}

	public function shift_operation() 
	{

		$id 	= $this->input->post('id');
		$date	= $this->input->post('date');
		$time	= $this->input->post('time');
		$shift	= $this->input->post('shift');		
		$unit 	= trim($this->input->post('unit'));
		$cargo 	= $this->input->post('cargo_muatan');
		$rom 	= $this->input->post('rom');

		$src 	= $this->Crud->search('table_shiftoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'deleted_at' 	=> NULL,
				'date'			=> $date,
				'time'			=> $time,
				'shift'			=> $shift,
				'cn_unit' 		=> $unit,
				'cargo' 		=> $cargo,
				'to_rom'		=> $rom,
				'by_area'		=> $this->by_area,
				'by_user'		=> $this->by_user
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

		// public function monitoring_operations_muatan_in_csa34()
		// {
		// 	$result 			= get_date_shift();	
		// 	// Variable
		// 	$date 				= date('Y-m-d', strtotime($result['date']));
		// 	$shift 				= $result['shift'];
		// 	$id 				= $this->input->post('id');
		// 	$code_standby 		= $this->input->post('code_standby');
		// 	$remark 			= trim($this->input->post('remark'));

		// 	$this->load->model('Post', 'operation');
		// 	$row 				= $this->operation->data_shift_operation_to_monitoring_34($id);
		// 	if ($row->num_rows() > 0) {
		// 		$row 					= $row->row_array();
		// 		$data = array(
		// 			'created_at' 		=> date('Y-m-d H:i:s'),
		// 			'updated_at' 		=> date('Y-m-d H:i:s'),
		// 			'ref_id'			=> $id,
		// 			'deleted_at' 		=> NULL,
		// 			'date'				=> $date,
		// 			'shift'				=> $shift,
		// 			'time_in'			=> date('Y-m-d H:i:s'),
		// 			'time_out'			=> NULL,
		// 			'cn_unit' 			=> $row['cn_unit'],
		// 			'position' 			=> $row['position'],
		// 			'cargo'				=> $row['cargo'],
		// 			'code_stby'			=> $code_standby,
		// 			'time_passing'		=> NULL,
		// 			'remark'			=> $remark,
		// 			'by_area'			=> $this->by_area,
		// 			'by_user'			=> $this->by_user
		// 		);

		// 		$this->db->insert('table_monitoringoperations', $data);

		// 		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
		//             <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
		//             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		//                 <span aria-hidden="true">&times;</span>
		//             </button>
		//         </div>');
		// 	}else{
		// 		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		// 	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		// 	        <h4><i class="icon fa fa-check"></i> Error!</h4>
		// 	        Check kembali data anda!.
		// 	      </div>');
		// 	}

		// 	redirect($_SERVER['HTTP_REFERER']);
		// }

	public function monitoring_operations_standby_csa34()
	{	
		// $timepassing = $this->input->post('time_passing') == '' ? '' : date('H:i',strtotime($this->input->post('time_passing').':00'));
  		//       $dateout = date('Y-m-d H:i:s', strtotime($this->input->post('date_out').' '.$this->input->post('time_out'))); == '' ? '' : date('Y-m-d H:i:s', strtotime($this->input->post('date_out').' '.$this->input->post('time_out')));
        

		$id 			= $this->input->post('id');
		$date			= $this->input->post('date');
		$shift			= $this->input->post('shift');		
		$date_in		= date('Y-m-d H:i:s', strtotime($this->input->post('date_in').' '.$this->input->post('time_in')));
		$date_out		= date('Y-m-d H:i:s', strtotime($this->input->post('date_out').' '.$this->input->post('time_out')));
		$unit 			= trim($this->input->post('unit'));
		$position 		= trim($this->input->post('position'));
		$cargo 			= $this->input->post('cargo_muatan');
		$code_standby 	= $this->input->post('code_standby');
		$time_passing 	= date('H:i',strtotime($this->input->post('time_passing').':00'));
		$remark 		= $this->input->post('remark');

		$src 	= $this->Crud->search('table_monitoringoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'deleted_at' 	=> NULL,
				'date'			=> $date,
				'shift'			=> $shift,
				'time_in'		=> $date_in,
				'time_out'		=> $date_out,
				'cn_unit' 		=> $unit,
				'position'		=> $position,
				'cargo' 		=> $cargo,
				'code_stby'		=> $code_standby,
				'time_passing'	=> $time_passing,
				'remark'		=> $remark,
				'by_area'		=> $this->by_area,
				'by_user'		=> $this->by_user
			);
			$this->db->where('id', $id);
			$this->db->update('table_monitoringoperations',$data);
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

		// redirect($_SERVER['HTTP_REFERER']);
	}

	public function ready_to_opt_34($id, $val)
	{
		if ($this->by_level == 'administrator') {
			$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
			$this->db->where('id', $id);
			$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out , 'by_area' => '10', 'by_user' => $this->by_user));# code...
		}else{
			$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
			$this->db->where('id', $id);
			$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out , 'by_area' => $this->by_area, 'by_user' => $this->by_user));
		}
	}

	public function monitoring_operations_standby_csa65()
	{	
		// $timepassing = $this->input->post('time_passing') == '' ? '' : date('H:i',strtotime($this->input->post('time_passing').':00'));
  		//       $dateout = date('Y-m-d H:i:s', strtotime($this->input->post('date_out').' '.$this->input->post('time_out'))); == '' ? '' : date('Y-m-d H:i:s', strtotime($this->input->post('date_out').' '.$this->input->post('time_out')));
        

		$id 			= $this->input->post('id');
		$date			= $this->input->post('date');
		$shift			= $this->input->post('shift');		
		$date_in		= date('Y-m-d H:i:s', strtotime($this->input->post('date_in').' '.$this->input->post('time_in')));
		$date_out		= date('Y-m-d H:i:s', strtotime($this->input->post('date_out').' '.$this->input->post('time_out')));
		$unit 			= trim($this->input->post('unit'));
		$position 		= trim($this->input->post('position'));
		$cargo 			= $this->input->post('cargo_muatan');
		$code_standby 	= $this->input->post('code_standby');
		$time_passing 	= date('H:i',strtotime($this->input->post('time_passing').':00'));
		$remark 		= $this->input->post('remark');

		$src 	= $this->Crud->search('table_monitoringoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$data = array(
				'updated_at' 	=> date('Y-m-d H:i:s'),
				'deleted_at' 	=> NULL,
				'date'			=> $date,
				'shift'			=> $shift,
				'time_in'		=> $date_in,
				'time_out'		=> $date_out,
				'cn_unit' 		=> $unit,
				'position'		=> $position,
				'cargo' 		=> $cargo,
				'code_stby'		=> $code_standby,
				'time_passing'	=> $time_passing,
				'remark'		=> $remark,
				'by_area'		=> $this->by_area,
				'by_user'		=> $this->by_user
			);
			$this->db->where('id', $id);
			$this->db->update('table_monitoringoperations',$data);
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

		// redirect($_SERVER['HTTP_REFERER']);
	}

	public function ready_to_opt_65($id, $val)
	{
		if ($this->by_level == 'administrator') {
			$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
			$this->db->where('id', $id);
			$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out , 'by_area' => '11', 'by_user' => $this->by_user));# code...
		}else{
			$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
			$this->db->where('id', $id);
			$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out , 'by_area' => $this->by_area, 'by_user' => $this->by_user));
		}
			
	}

	public function ready_to_opt_69($id, $val)
	{
		$time_out = $val == 0 ? '' : date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		$this->db->update('table_monitoringoperations', array('operation' => $val, 'time_out' => $time_out , 'by_area' => $this->by_area, 'by_user' => $this->by_user));
	}

	public function rom_out($id = 1) 
	{
		$this->load->model('Rom', 'rom');
		$row = $this->rom->detail_ref_rom_operations($id);
		
		if ($row->num_rows() > 0) {
			$row 			= $row->row_array();
			$time_passing 	= date('i') > 55 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

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

	public function people() 
	{
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

	public function reset_password() 
	{
		$id = trim($this->input->post('id'));
		$username = trim($this->input->post('username'));
		$password = password_hash(trim($username), PASSWORD_DEFAULT);
		$src = $this->Crud->search('table_users', array('id' => $id, 'username' => $username))->num_rows();
		if ($src > 0) {
			$data = array(
				'id' => $id,
				'password' => $password
			);
			$this->Crud->update('table_users', array('id' => $id), $data);
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

}