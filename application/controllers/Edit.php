<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct() {
		parent::__construct();	
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
				'to_rom'		=> $rom
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

}