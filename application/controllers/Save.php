<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Save extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->load->model('Crud');
	}

	public function save_add_unit()
	{

		$by_area			= $this->session->userdata('area');
		$by_user			= $this->session->userdata('id');

		$result 	= get_date_shift();	
			print_r($_POST);
		// Variable
		$date 				= date('Y-m-d', strtotime($this->input->post('date')));
		$shift 				= $this->input->post('shift');
		$area 				= $this->input->post('area');
		$id_unit 			= $this->input->post('id_unit');
		$position 			= $this->input->post('position');
		$cargo_muatan 		= $this->input->post('cargo_muatan');
		$code_standby 		= $this->input->post('code_standby');
		$date_in	 		= date('Y-m-d H:i', strtotime($this->input->post('date_in').' '.$this->input->post('time_in')));
		$date_out	 		= date('Y-m-d H:i', strtotime($this->input->post('date_out').' '.$this->input->post('time_out')));
		$time_passing		= date('H:i', strtotime($this->input->post('date_out').' '.$this->input->post('time_passing').':00'));
		$remark 			= $this->input->post('remark');
		$operation 			= strtolower($code_standby) == 'l' ? 1 : 0;

		$this->form_validation->set_rules('date','date','required');
		$this->form_validation->set_rules('id_unit','id_unit','required');
		$this->form_validation->set_rules('position','position','required');
		$this->form_validation->set_rules('cargo_muatan','cargo_muatan','required');
		$this->form_validation->set_rules('code_standby','code_standby','required');

		if( $this->form_validation->run() != false ) {


			$this->db->where('table_shiftoperations.deleted_at IS NULL AND table_shiftoperations.date = \''.$result['date'].'\'');
			$this->db->where('table_shiftoperations.deleted_at IS NULL ');
				if ($by_area) {
					$this->db->where('table_shiftoperations.by_area', $by_area);
				}
			if (strtolower($code) == 'l') {
				$this->db->group_start();
	 			$this->db->where('code_standby', 'L');
				$this->db->or_where('operation !=', '0');
				$this->db->group_end();
			} elseif (strtolower($code) != '') {
				$this->db->group_start();
				$this->db->where('code_standby !=', 'L');
				$this->db->where('operation', '0');
				$this->db->group_end();
			}
			$check_order = $this->db->get('table_shiftoperations');

			$data = array(
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s'),
					'deleted_at' 		=> NULL,
					'date' 				=> $date,
					'shift' 			=> $shift,
					'time_in' 			=> $date_in,					
					'time_out' 			=> $date_out,
					'location'			=> $by_area,					
					'cn_unit' 			=> $id_unit,
					'position' 			=> $position,
					'cargo' 			=> $cargo_muatan,
					'code_stby' 		=> $code_standby,
					'time_passing'		=> $time_passing,
					'remark'			=> $remark,
					'operation'			=> $operation,
					'by_ordered'		=> ($check_order->num_rows()+1),
					'by_area'			=> $by_area,
					'by_user'			=> $by_user
				);

				$this->Crud->insert('table_shiftoperations', $data);

				$this->session->set_flashdata('msg', '<div class="alert  alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Success</span> <b>"' . $this->input->post('kode_alamo') . '"</b> has been added.
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
	public function bulk_shift_operation()
	{
		$result 	= get_date_shift();	
		print_r($_POST);
		$by_area			= $this->session->userdata('area');
		$by_user			= $this->session->userdata('id');
		$cn_unit 			= $this->input->post('cn');
		$posisi 			= $this->input->post('posisi');
		$cargo 				= $this->input->post('cargo');
		$code_stby 			= $this->input->post('code_stby');
		$remark 			= $this->input->post('remark');
		$check_order = $this->db->get('table_shiftoperations');
		$i = 0;
		$no = $check_order->num_rows();
		$this->form_validation->set_rules('cn[]','cn','required');
		if( $this->form_validation->run() != false ) {	
			foreach ($cn_unit as $value) {
				$no++;
				if( strtolower($code_stby[$i]) == 'l') :
					$this->db->insert('table_shiftoperations', array(
						'created_at'		=> date('Y-m-d H:i:s'),
						'updated_at'		=> date('Y-m-d H:i:s'),
						'deleted_at'		=> NULL,
						'date'				=> date('Y-m-d', strtotime($result['date'])),
						'shift'				=> $result['shift'],
						'time_in'			=> date('Y-m-d H:i:s'),
						'time_out'			=> date('Y-m-d H:i:s'),
						'location'			=> $by_area,
						'cn_unit'			=> $value,
						'position'			=> $posisi[$i],
						'cargo'				=> $cargo[$i],
						'code_stby'			=> $code_stby[$i],
						'time_passing'		=> date('H:i:s'),
						'remark'			=> $remark[$i],
						'by_ordered'		=> $no,
						'by_area'			=> $by_area,
						'by_user'			=> $by_user,
						'operation'			=> 1
					));
				else:
					$this->db->insert('table_shiftoperations', array(
						'created_at'		=> date('Y-m-d H:i:s'),
						'updated_at'		=> date('Y-m-d H:i:s'),
						'deleted_at'		=> NULL,
						'date'				=> date('Y-m-d', strtotime($result['date'])),
						'shift'				=> $result['shift'],
						'time_in'			=> date('Y-m-d H:i:s'),
						'time_out'			=> date('Y-m-d H:i:s'),
						'location'			=> $by_area,
						'cn_unit'			=> $value,
						'position'			=> $posisi[$i],
						'cargo'				=> $cargo[$i],
						'code_stby'			=> $code_stby[$i],
						'time_passing'		=> date('H:i:s'),
						'remark'			=> $remark[$i],
						'by_ordered'		=> $no,
						'by_area'			=> $by_area,
						'by_user'			=> $by_user
					));
				endif;
				$i++;
			}
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
	        Data telah tersimpan!.
	      </div>');

		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-check"></i> Error!</h4>
	        ' . validation_errors() . '
	      </div>');
		 }
		 // redirect($_SERVER['HTTP_REFERER']);
		
		redirect(base_url('Dash/daily_record_production'));
	}

	public function code_material()
	{
		$by_user			= $this->session->userdata('id');

		$code_sis 	 = trim($this->input->post('name'));
		$color 	 = trim($this->input->post('category_description'));

		$src = $this->Crud->search('enum', array(
			'name' => $code_sis, 
			'category_description' => $color, 
			'deleted_at' => NULL))->num_rows();
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
				'category_description' 	=> $color,
				'type' 					=> 'material_new',
				'by_user' 				=> $by_user
			);
			$this->Crud->insert('enum', $data);
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
	            <span class="badge badge-pill badge-success">Success</span> <b>"' . $this->input->post('kode_alamo') . '"</b> has been added.
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