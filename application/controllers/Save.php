<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Save extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->by_level			= $this->session->userdata('level');
		$this->by_area			= $this->session->userdata('area');
		$this->by_rom			= $this->session->userdata('rom');
		$this->by_user			= $this->session->userdata('id');
	}

	public function shift_operation() 
	{
		if ($this->by_level == 'administrator') {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$time 				= $this->input->post('time');
			$id_unit 			= $this->input->post('id_unit');
			$position 			= "K";
			$cargo_muatan 		= $this->input->post('cargo_muatan');
			$to_rom				= $this->input->post('rom');

			$this->form_validation->set_rules('id_unit','id_unit','required');
			$this->form_validation->set_rules('cargo_muatan','cargo_muatan','required');
			$this->form_validation->set_rules('rom','by rom','required');

			if( $this->form_validation->run() != false ) {
				$data = array(
						'created_at' 		=> date('Y-m-d H:i:s'),
						'updated_at' 		=> date('Y-m-d H:i:s'),
						'deleted_at' 		=> NULL,
						'date' 				=> $date,
						'time'				=> $time,
						'shift' 			=> $shift,
						'cn_unit' 			=> $id_unit,
						'position' 			=> $position,
						'cargo' 			=> $cargo_muatan,
						'remark'			=> NULL,
						'to_rom'			=> $to_rom,
						'by_area'			=> '107',
						'by_user'			=> $this->by_user
					);

				$this->Crud->insert('table_shiftoperations', $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert"><span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert"><span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
		redirect($_SERVER['HTTP_REFERER']);
		}else{
			$result 			= get_date_shift();	
		// Variable
		$date 				= date('Y-m-d', strtotime($result['date']));
		$shift 				= $result['shift'];
		$time 				= $this->input->post('time');
		$id_unit 			= $this->input->post('id_unit');
		$position 			= "K";
		$cargo_muatan 		= $this->input->post('cargo_muatan');
		$to_rom				= $this->input->post('rom');

		$this->form_validation->set_rules('id_unit','id_unit','required');
		$this->form_validation->set_rules('cargo_muatan','cargo_muatan','required');
		$this->form_validation->set_rules('rom','by rom','required');

			if( $this->form_validation->run() != false ) {
				$data = array(
						'created_at' 		=> date('Y-m-d H:i:s'),
						'updated_at' 		=> date('Y-m-d H:i:s'),
						'deleted_at' 		=> NULL,
						'date' 				=> $date,
						'time'				=> $time,
						'shift' 			=> $shift,
						'cn_unit' 			=> $id_unit,
						'position' 			=> $position,
						'cargo' 			=> $cargo_muatan,
						'remark'			=> NULL,
						'to_rom'			=> $to_rom,
						'by_area'			=> $this->by_area,
						'by_user'			=> $this->by_user
					);

				$this->Crud->insert('table_shiftoperations', $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert"><span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert"><span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
		redirect($_SERVER['HTTP_REFERER']);
		}
		
	}

	public function bulk_shift_operation() 
	{
		// print_r($_POST);
		$result 		= get_date_shift();	
		$date 			= date('Y-m-d', strtotime($result['date']));
		$shift 			= $result['shift'];
		$time 			= $this->input->post('time');
		$id_unit 		= $this->input->post('id_unit');
		$position 		= "K";
		$cargo_muatan	= $this->input->post('cargo_muatan');
		$to_rom			= $this->input->post('rom');
		$i = 0;
		$this->form_validation->set_rules('id_unit[]','id_unit','required');
		if( $this->form_validation->run() != false ) {	
			foreach ($id_unit as $value) {
				$this->db->insert('table_shiftoperations', array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date' 				=> $date,
					'time'				=> $time[$i],
					'shift' 			=> $shift,
					'cn_unit' 			=> $value,
					'position' 			=> $position,
					'cargo' 			=> $cargo_muatan[$i],
					'remark'			=> NULL,
					'to_rom'			=> $to_rom[$i],
					'by_area'			=> $this->by_area,
					'by_user'			=> $this->by_user
					));
				$i++;
			}			
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	        <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	        </button></div>');
		}else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
		}
		 redirect($_SERVER['HTTP_REFERER']);
		
		// redirect(base_url('Dash/daily_record_production'));
	}

	public function monitoring_operations_34_kosongan() 
	{
		if ($this->by_level) {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id_unit 			= $this->input->post('id_unit');
			$position 			= $this->input->post('position');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= $this->input->post('remark');

			$this->form_validation->set_rules('id_unit','id_unit','required');
			$this->form_validation->set_rules('position','position','required');
			$this->form_validation->set_rules('code_standby','code_standby','required');

			if( $this->form_validation->run() != false ) {
				$data = array(
						'ref_id'			=> 0,
						'created_at' 		=> date('Y-m-d H:i:s'),
						'updated_at' 		=> date('Y-m-d H:i:s'),
						'deleted_at' 		=> NULL,
						'date'				=> $date,
						'shift'				=> $shift,
						'time_in'			=> date('Y-m-d H:i:s'),
						'time_out'			=> NULL,
						'cn_unit' 			=> $id_unit,
						'position' 			=> $position,
						'cargo' 			=> "Kosongan",
						'code_stby' 		=> $code_standby,
						'time_passing'		=> NULL,
						'remark'			=> $remark,
						'operation' 		=> 0,
						'by_ordered'		=> 0,
						'by_area'			=> '10',
						'by_user'			=> $this->by_user
					);

					$this->Crud->insert('table_monitoringoperations', $data);

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
		            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>');


			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
			}
			redirect($_SERVER['HTTP_REFERER']);# code...
		}else{
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id_unit 			= $this->input->post('id_unit');
			$position 			= $this->input->post('position');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= $this->input->post('remark');

			$this->form_validation->set_rules('id_unit','id_unit','required');
			$this->form_validation->set_rules('position','position','required');
			$this->form_validation->set_rules('code_standby','code_standby','required');

			if( $this->form_validation->run() != false ) {
				$data = array(
						'ref_id'			=> 0,
						'created_at' 		=> date('Y-m-d H:i:s'),
						'updated_at' 		=> date('Y-m-d H:i:s'),
						'deleted_at' 		=> NULL,
						'date'				=> $date,
						'shift'				=> $shift,
						'time_in'			=> date('Y-m-d H:i:s'),
						'time_out'			=> NULL,
						'cn_unit' 			=> $id_unit,
						'position' 			=> $position,
						'cargo' 			=> "Kosongan",
						'code_stby' 		=> $code_standby,
						'time_passing'		=> NULL,
						'remark'			=> $remark,
						'operation' 		=> 0,
						'by_ordered'		=> 0,
						'by_area'			=> $this->by_area,
						'by_user'			=> $this->by_user
					);

					$this->Crud->insert('table_monitoringoperations', $data);

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
		            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>');


			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}		
	}

	public function monitoring_operations_muatan_in_csa34()
	{
		if ($this->by_level == 'administrator') {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id 				= $this->input->post('id');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= trim($this->input->post('remark'));

			$this->load->model('Post', 'operation');
			$row 				= $this->operation->data_shift_operation_to_monitoring_34($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'ref_id'			=> $id,
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> $code_standby,
					'time_passing'		=> NULL,
					'remark'			=> $remark,
					'by_area'			=> '10',
					'by_user'			=> $this->by_user
				);

				$this->db->insert('table_monitoringoperations', $data);

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

			redirect($_SERVER['HTTP_REFERER']);# code...
		}else{
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id 				= $this->input->post('id');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= trim($this->input->post('remark'));

			$this->load->model('Post', 'operation');
			$row 				= $this->operation->data_shift_operation_to_monitoring_34($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'ref_id'			=> $id,
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> $code_standby,
					'time_passing'		=> NULL,
					'remark'			=> $remark,
					'by_area'			=> $this->by_area,
					'by_user'			=> $this->by_user
				);

				$this->db->insert('table_monitoringoperations', $data);

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
	}

	public function bypass_monitoring_operations_34($id = 1) 
	{
		if ($this->by_level == 'administrator') {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$this->load->model('Post', 'operations');

			$row 	= $this->operations->data_shift_operation_to_monitoring_34($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$time_passing 			= date('i') > 50 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

				$data = array(
					'ref_id'			=> $id,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> date('Y-m-d H:i:s'),
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> "L",
					'time_passing'		=> $time_passing,
					'operation'			=> 1,
					'remark'			=> NULL,
					'by_area'			=> '10',
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

			// redirect($_SERVER['HTTP_REFERER']);# code...
		}else{
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$this->load->model('Post', 'operations');

			$row 	= $this->operations->data_shift_operation_to_monitoring_34($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$time_passing 			= date('i') > 50 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

				$data = array(
					'ref_id'			=> $id,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> date('Y-m-d H:i:s'),
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> "L",
					'time_passing'		=> $time_passing,
					'operation'			=> 1,
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
			
	}

	public function monitoring_operations_65_kosongan()
	{
		if ($this->by_level	== 'administrator') {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id_unit 			= $this->input->post('id_unit');
			$position 			= $this->input->post('position');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= $this->input->post('remark');

			$this->form_validation->set_rules('id_unit','id_unit','required');
			$this->form_validation->set_rules('position','position','required');
			$this->form_validation->set_rules('code_standby','code_standby','required');

			if( $this->form_validation->run() != false ) {
				$data = array(
						'ref_id'			=> 0,
						'created_at' 		=> date('Y-m-d H:i:s'),
						'updated_at' 		=> date('Y-m-d H:i:s'),
						'deleted_at' 		=> NULL,
						'date'				=> $date,
						'shift'				=> $shift,
						'time_in'			=> date('Y-m-d H:i:s'),
						'time_out'			=> NULL,
						'cn_unit' 			=> $id_unit,
						'position' 			=> $position,
						'cargo' 			=> "Kosongan",
						'code_stby' 		=> $code_standby,
						'time_passing'		=> NULL,
						'remark'			=> $remark,
						'operation' 		=> 0,
						'by_ordered'		=> 0,
						'by_area'			=> '11',
						'by_user'			=> $this->by_user
					);

					$this->Crud->insert('table_monitoringoperations', $data);

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
		            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>');


			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id_unit 			= $this->input->post('id_unit');
			$position 			= $this->input->post('position');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= $this->input->post('remark');

			$this->form_validation->set_rules('id_unit','id_unit','required');
			$this->form_validation->set_rules('position','position','required');
			$this->form_validation->set_rules('code_standby','code_standby','required');

			if( $this->form_validation->run() != false ) {
				$data = array(
						'ref_id'			=> 0,
						'created_at' 		=> date('Y-m-d H:i:s'),
						'updated_at' 		=> date('Y-m-d H:i:s'),
						'deleted_at' 		=> NULL,
						'date'				=> $date,
						'shift'				=> $shift,
						'time_in'			=> date('Y-m-d H:i:s'),
						'time_out'			=> NULL,
						'cn_unit' 			=> $id_unit,
						'position' 			=> $position,
						'cargo' 			=> "Kosongan",
						'code_stby' 		=> $code_standby,
						'time_passing'		=> NULL,
						'remark'			=> $remark,
						'operation' 		=> 0,
						'by_ordered'		=> 0,
						'by_area'			=> $this->by_area,
						'by_user'			=> $this->by_user
					);

					$this->Crud->insert('table_monitoringoperations', $data);

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
		            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>');


			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}			
	}

	public function monitoring_operations_muatan_in_csa65()
	{
		if ($this->by_level == 'administrator') {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id 				= $this->input->post('id');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= trim($this->input->post('remark'));

			$this->load->model('Post', 'operation');
			$row 				= $this->operation->data_shift_operation_to_monitoring_65($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'ref_id'			=> $id,
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> $code_standby,
					'time_passing'		=> NULL,
					'remark'			=> $remark,
					'by_area'			=> '11',
					'by_user'			=> $this->by_user
				);

				$this->db->insert('table_monitoringoperations', $data);

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
		}else{
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$id 				= $this->input->post('id');
			$code_standby 		= $this->input->post('code_standby');
			$remark 			= trim($this->input->post('remark'));

			$this->load->model('Post', 'operation');
			$row 				= $this->operation->data_shift_operation_to_monitoring_65($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'ref_id'			=> $id,
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> $code_standby,
					'time_passing'		=> NULL,
					'remark'			=> $remark,
					'by_area'			=> $this->by_area,
					'by_user'			=> $this->by_user
				);

				$this->db->insert('table_monitoringoperations', $data);

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
	}

	public function bypass_monitoring_operations_65($id = 1) 
	{
		if ($this->by_level == 'administrator') {
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$this->load->model('Post', 'operations');

			$row 	= $this->operations->data_shift_operation_to_monitoring_65($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$time_passing 			= date('i') > 50 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

				$data = array(
					'ref_id'			=> $id,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> date('Y-m-d H:i:s'),
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> "L",
					'time_passing'		=> $time_passing,
					'operation'			=> 1,
					'remark'			=> NULL,
					'by_area'			=> '11',
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

		// redirect($_SERVER['HTTP_REFERER']);# code...
		}else{
			$result 			= get_date_shift();	
			// Variable
			$date 				= date('Y-m-d', strtotime($result['date']));
			$shift 				= $result['shift'];
			$this->load->model('Post', 'operations');

			$row 	= $this->operations->data_shift_operation_to_monitoring_65($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$time_passing 			= date('i') > 50 ? date('H:00:00', strtotime('+1 Hour')) : date('H:00:00');

				$data = array(
					'ref_id'			=> $id,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date'				=> $date,
					'shift'				=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> date('Y-m-d H:i:s'),
					'cn_unit' 			=> $row['cn_unit'],
					'position' 			=> $row['position'],
					'cargo'				=> $row['cargo'],
					'code_stby'			=> "L",
					'time_passing'		=> $time_passing,
					'operation'			=> 1,
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
	}

	public function monitoring_operations_69() 
	{
		$result 			= get_date_shift();	
		// Variable
		$date 				= date('Y-m-d', strtotime($result['date']));
		$shift 				= $result['shift'];
		$id_unit 			= $this->input->post('id_unit');
		$position 			= $this->input->post('position');
		$code_standby 		= $this->input->post('code_standby');
		$remark 			= $this->input->post('remark');

		$this->form_validation->set_rules('id_unit','id_unit','required');
		$this->form_validation->set_rules('position','position','required');
		$this->form_validation->set_rules('code_standby','code_standby','required');

		if( $this->form_validation->run() != false ) {
			$data = array(
					'ref_id'			=> 0,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date' 				=> $date,
					'shift' 			=> $shift,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $id_unit,
					'position' 			=> $position,
					'cargo' 			=> NULL,
					'code_stby' 		=> $code_standby,
					'time_passing'		=> NULL,
					'remark'			=> $remark,
					'operation' 		=> 0,
					'by_ordered'		=> 0,
					'by_area'			=> $this->by_area,
					'by_user'			=> $this->by_user
				);

				$this->Crud->insert('table_monitoringoperations', $data);

				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');


		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function rom_in($id)
	{
		// $check 					= $this->rom->detail_ref_rom_operations($id);
		// if($check->num_rows() > 0) {
		// 	$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
		//         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		//         <h4><i class="icon fa fa-check"></i> Error!</h4>
		//         Check kembali data anda!.
		//       </div>');
		// 	redirect($_SERVER['HTTP_REFERER']);
		// 	return false;
		// }
		// $this->load->model('Rom_operations', 'rom');
		if ($this->by_level == 'administrator') {
			$this->load->model('Dispatching', 'operation');		
			$row = $this->operation->edit_record_production($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'ref_id'			=> $id,
					'deleted_at' 		=> NULL,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $row['cn_unit'],
					'remark'			=> NULL,
					'by_rom'			=> $row['to_rom'],
					'by_user'			=> $this->by_user
				);
				$this->db->insert('table_romoperations', $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissible" role="alert">
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
		}else{
			$this->load->model('Dispatching', 'operation');		
			$row = $this->operation->edit_record_production($id);
			if ($row->num_rows() > 0) {
				$row 					= $row->row_array();
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'ref_id'			=> $id,
					'deleted_at' 		=> NULL,
					'time_in'			=> date('Y-m-d H:i:s'),
					'time_out'			=> NULL,
					'cn_unit' 			=> $row['cn_unit'],
					'remark'			=> NULL,
					'by_rom'			=> $this->by_rom,
					'by_user'			=> $this->by_user
				);
				$this->db->insert('table_romoperations', $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-info alert-dismissible" role="alert">
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
	}

	public function people() 
	{
		$username = trim($this->input->post('username'));
		$name = trim($this->input->post('full_name'));
		$password = password_hash(trim($this->input->post('pass')), PASSWORD_DEFAULT);
		$description = trim($this->input->post('description'));
		$level = trim($this->input->post('level'));
		$src = $this->Crud->search('table_users', array('username' => $username))->num_rows();
		if ( preg_match('/[^A-Za-z0-9]/',$username)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                Insert error, username only allowed number and alfabet!
	              </div>');
		} else {
			if ($src > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                Username <b>"' . $username . '"</b> is already on database!
	              </div>');
			} else {
				$src = $this->Crud->search('table_enum', array('id' => $level, 'type' => 'level'))->num_rows();
				if ($src > 0) {
					$data = array(
						'created_at'	=> date('Y-m-d H:i:s'),
						'updated_at'	=> date('Y-m-d H:i:s'),
						'nrp'			=> $username,
						'username' 		=> $username,
						'full_name'		=> $name,
						'password' 		=> $password,
						'description' 	=> $description,
						'level' 		=> $level,
					);
					$this->Crud->insert('table_users', $data);
					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade-alert">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Success!</h4>
		                <b>"' . $name . '"</b> is added on database!
		              </div>');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                Insert error, please check your data again!
	              </div>');				
				}
			}
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cargo_muatan()
	{
		$by_user			= $this->session->userdata('id');

		$code_sis 	= trim($this->input->post('name'));
		$color 	 	= trim($this->input->post('description'));

		$src = $this->Crud->search('table_enum', array(
			'name' 			=> $code_sis, 
			'description' 	=> $color, 
			'deleted_at' 	=> NULL))->num_rows();
		if ($src > 0) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Name <b>"' . $code_ai . '"</b> is already on ' . $code_sis .'!
              </div>');
		} else {
			$data = array(
				'created_at'			=> date('Y-m-d H:i:s'),
				'updated_at'			=> date('Y-m-d H:i:s'),
				'name' 					=> $code_sis, 
				'description' 			=> $color,
				'type' 					=> 'cargo_muatan',
				'by_user' 				=> $by_user
			);
			$this->Crud->insert('table_enum', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <b>"' . $code_ai . '"</b> is added on ' . $code_sis .'!
              </div>');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function quality()
	{
		// $result 	= get_date_shift();	
		$by_user	= $this->session->userdata('id');

		$this->form_validation->set_rules('date','date','required');
		$this->form_validation->set_rules('series','series','required');
		if( $this->form_validation->run() != false ) {			
				$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date' 				=> date('Y-m-d'),
					'series' 		 	=> trim($this->input->post('series')),
					'tm' 				=> trim($this->input->post('tm')),
					'im' 				=> trim($this->input->post('im')),					
					'ash_ar' 			=> trim($this->input->post('ash_ar')),
					'ts_ar' 			=> trim($this->input->post('ts_ar')),
					'cv_ar' 			=> trim($this->input->post('cv_ar')),
					'hgi' 				=> trim($this->input->post('hgi')),
					'by_user'			=> $by_user
				);


				$this->Crud->insert('table_quality', $data);

				$this->session->set_flashdata('msg', '<div class="alert  alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>"' . $this->input->post('series') . '"</b> has been added.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> ' . validation_errors() . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		 }
		 redirect($_SERVER['HTTP_REFERER']);
	}

}