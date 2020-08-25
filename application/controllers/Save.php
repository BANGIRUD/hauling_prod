<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Save extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->by_area			= $this->session->userdata('area');
		$this->by_rom			= $this->session->userdata('rom');
		$this->by_user			= $this->session->userdata('id');
	}

	public function shift_operation() {


		$result 			= get_date_shift();	
		// Variable
		$date 				= date('Y-m-d', strtotime($result['date']));
		$shift 				= $result['shift'];
		$id_unit 			= $this->input->post('id_unit');
		$position 			= "K";
		$cargo_muatan 		= $this->input->post('cargo_muatan');
		$to_rom				= $this->input->post('rom');
		$remark 			= "";

		$this->form_validation->set_rules('id_unit','id_unit','required');
		$this->form_validation->set_rules('cargo_muatan','cargo_muatan','required');
		$this->form_validation->set_rules('rom','by rom','required');

		if( $this->form_validation->run() != false ) {

			$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date' 				=> $date,
					'shift' 			=> $shift,
					'cn_unit' 			=> $id_unit,
					'position' 			=> $position,
					'cargo' 			=> $cargo_muatan,
					'remark'			=> $remark,
					'to_rom'			=> $to_rom,
					'by_area'			=> $this->by_area,
					'by_user'			=> $this->by_user
				);

				$this->Crud->insert('table_shiftoperations', $data);

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

	public function monitoring_operations() {
		$this->load->model('Shift_operations', 'operation');
		$this->load->model('Monitoring_operations', 'monitoring');

		$id 					= trim($this->input->post('id'));
		$code_standby 			= trim($this->input->post('code_standby'));

		$row 					= $this->operation->detail_shift_operations($id);
		if ($row->num_rows() > 0) {

			// $check 					= $this->monitoring->detail_ref_monitoring_operations($id);
			// if($check->num_rows() > 0) {
			// 	$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
			//         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			//         <h4><i class="icon fa fa-check"></i> Error!</h4>
			//         Check kembali data anda!.
			//       </div>');
			// 	redirect($_SERVER['HTTP_REFERER']);
			// 	return false;
			// }


			$row 					= $row->row_array();

			$data = array(
				'created_at' 		=> date('Y-m-d H:i:s'),
				'updated_at' 		=> date('Y-m-d H:i:s'),
				'ref_id'			=> $id,
				'deleted_at' 		=> NULL,
				'time_in'			=> date('Y-m-d H:i:s'),
				'time_out'			=> NULL,
				'cn_unit' 			=> $row['cn_unit'],
				'position' 			=> $row['position'],
				'cargo'				=> $row['cargo'],
				'code_stby'			=> $code_standby,
				'time_passing'		=> NULL,
				'remark'			=> NULL,
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

	public function rom_operations($id) {
		$this->load->model('Shift_operations', 'operation');
		$this->load->model('Rom_operations', 'rom');

		$row 					= $this->operation->detail_shift_operations($id);
		if ($row->num_rows() > 0) {

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

			$this->session->set_flashdata('msg2', '<div class="alert alert-info alert-dismissible" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>Data</b> has been added.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
		}else{
			$this->session->set_flashdata('msg2', '<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-check"></i> Error!</h4>
		        Check kembali data anda!.
		      </div>');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}