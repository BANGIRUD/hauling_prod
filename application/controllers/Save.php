<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Save extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->by_area			= $this->session->userdata('area');
		$this->by_rom			= $this->session->userdata('rom');
		$this->by_user			= $this->session->userdata('id');
	}

	public function shift_operation() 
	{

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

	public function monitoring_operations_muatan_in_csa34()
	{
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

	public function bypass_monitoring_operations_34($id = 1) 
	{
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