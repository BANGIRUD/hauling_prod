<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->load->model('Crud');
	}

	public function quality()
	{
		$by_user 	= $this->session->userdata('id');

		require_once(APPPATH.'libraries/excel_reader.php');
		$config['upload_path']          = './___/uploads';
		$config['allowed_types']        = 'xls';

		$this->load->library('upload', $config);
		$result = get_date_shift();
			
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> Format excel denied!. Please change to Excel 2003 (.xls).
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}else{
			$uploader = $this->upload->data();
			$datas = new Spreadsheet_Excel_Reader($uploader['full_path']);
			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {				
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 2) ) ));
				$series	 			= trim( $datas->val($i, 3) );
				$tm 	 			= trim( $datas->val($i, 4) );
				$im  				= trim( $datas->val($i, 5) );
				$ash_ar				= trim( $datas->val($i, 6) );
				$ts_ar				= trim( $datas->val($i, 7) );
				$cv_ar				= trim( $datas->val($i, 8) );
				$hgi				= trim( $datas->val($i, 9) );


				if ($series != '') {

					$src	= $this->Crud->search('table_quality', array(
						'date'			=> $date, 
						'series'		=> $series, 
						'deleted_at' 	=> NULL));

					if ($src->num_rows() > 0 ) {
						$x 			= $src->row_array();
						$data 		= array(
										'updated_at'	=> date('Y-m-d H:i:s'),
										'series'		=> $series,
										'tm'			=> $tm,
										'im'			=> $im,
										'ash_ar'		=> $ash_ar,
										'ts_ar'			=> $ts_ar,
										'cv_ar'			=> $cv_ar,
										'hgi'			=> $hgi,
										'by_user'		=> $by_user
									);
					$this->Crud->update('table_quality', array('id' => $x['id']), $data);
					} else {						
						$data 		= array(
										'created_at'	=> date('Y-m-d H:i:s'), 
										'updated_at'	=> date('Y-m-d H:i:s'), 
										'date'			=> $date,
										'series'		=> $series,
										'tm'			=> $tm,
										'im'			=> $im,
										'ash_ar'		=> $ash_ar,
										'ts_ar'			=> $ts_ar,
										'cv_ar'			=> $cv_ar,
										'hgi'			=> $hgi,
										'by_user'		=> $by_user
									);
					$this->Crud->insert('table_quality', $data);
					}
				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Excellent</span> Now you have new setting maintenance!
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');

			// unlink($uploader['full_path']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function daily_overshift_unit()
	{
		$by_user 	= $this->session->userdata('id');

		require_once(APPPATH.'libraries/excel_reader.php');
		$config['upload_path']          = './___/uploads';
		$config['allowed_types']        = 'xls';

		$this->load->library('upload', $config);
		$result = get_date_shift();
			
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> Format excel denied!. Please change to Excel 2003 (.xls).
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}else{
			$uploader = $this->upload->data();
			$datas = new Spreadsheet_Excel_Reader($uploader['full_path']);
			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {				
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 2) ) ));
				$code_number		= trim( $datas->val($i, 3) );
				$no_unit			= trim( $datas->val($i, 4) );
				$no_id 				= trim( $datas->val($i, 5) );
				$time 				= trim( $datas->val($i, 6) );
				$csa 				= trim( $datas->val($i, 7) );
				

				if ($code_number != '') {

					$src  	= $this->Crud->search('table_shiftos', array(
						'date'			=> $date, 
						'code_number'	=> $code_number, 
						'deleted_at' 	=> NULL));
					if ($src->num_rows() > 0 ) {
						$x 			= $src->row_array();
						$data 		= array(
										'updated_at'	=> date('Y-m-d H:i:s'),
										'code_number'	=> $code_number,
										'no_unit'		=> $no_unit,
										'no_id'			=> $no_id,
										'time'			=> $time,
										'csa'			=> $csa,
										'by_user'		=> $by_user
									);
									$this->Crud->update('table_shiftos', array('id' => $x['id']), $data);
					} else {						
						$data 		= array(
										'created_at'	=> date('Y-m-d H:i:s'), 
										'updated_at'	=> date('Y-m-d H:i:s'),
										'date'			=> $date, 
										'code_number'	=> $code_number,
										'no_unit'		=> $no_unit,
										'no_id'			=> $no_id,
										'time'			=> $time,
										'csa'			=> $csa,
										'by_user'		=> $by_user
									);
									$this->Crud->insert('table_shiftos', $data);
					}
				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Excellent</span> Now you have new setting maintenance!
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');

			// unlink($uploader['full_path']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function populasi_unit()
	{
		$by_user 	= $this->session->userdata('id');

		require_once(APPPATH.'libraries/excel_reader.php');
		$config['upload_path']          = './___/uploads';
		$config['allowed_types']        = 'xls';

		$this->load->library('upload', $config);
		$result = get_date_shift();
			
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> Format excel denied!. Please change to Excel 2003 (.xls).
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}else{
			$uploader = $this->upload->data();
			$datas = new Spreadsheet_Excel_Reader($uploader['full_path']);
			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {				
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 2) ) ));
				$set_trailler		= trim( $datas->val($i, 3) );
				$unit_id			= trim( $datas->val($i, 4) );
				$no_unit			= trim( $datas->val($i, 5) );
				$model 				= trim( $datas->val($i, 6) );
				$chassis_number		= trim( $datas->val($i, 7) );
				$brand_state		= trim( $datas->val($i, 8) );
				$product			= trim( $datas->val($i, 9) );
				$engine_model		= trim( $datas->val($i, 10) );
				$delivery			= trim( $datas->val($i, 11) );
				$engine_number		= trim( $datas->val($i, 12) );
				$kw_hp_rpm			= trim( $datas->val($i, 13) );
				$type 				= trim( $datas->val($i, 14) );
				$capacity			= trim( $datas->val($i, 15) );
				$doc_ellipse		= trim( $datas->val($i, 16) );
				$owner_unit			= trim( $datas->val($i, 17) );
				$status_unit		= trim( $datas->val($i, 18) );
				$status_to_use		= trim( $datas->val($i, 19) );

				if ($unit_id != '') {

					$src  			= $this->Crud->search('table_equipment', array('date' => $date, 'unit_id'		=> $unit_id, 'deleted_at' => NULL));
					if ($src->num_rows() > 0 ) {
						$x 			= $src->row_array();
						$data 		= array(
										'updated_at'		=> date('Y-m-d H:i:s'),
										'set_trailler' 		=> $set_trailler,
										'unit_id' 			=> $unit_id,
										'no_unit' 			=> $no_unit,
										'model' 			=> $model,
										'chassis_number' 	=> $chassis_number,
										'brand_state' 		=> $brand_state,
										'product' 			=> $product,
										'engine_model'	 	=> $engine_model,
										'delivery' 			=> $delivery,
										'engine_number' 	=> $engine_number,
										'kw_hp_rpm' 		=> $kw_hp_rpm,
										'type' 				=> $type,
										'capacity' 			=> $capacity,
										'doc_ellipse' 		=> $doc_ellipse,
										'owner_unit' 		=> $owner_unit,
										'status_unit' 		=> $status_unit,
										'status_to_use' 	=> $status_to_use,
										'by_user'			=> $by_user
									);
									$this->Crud->update('table_equipment', array('id' => $x['id']), $data);
					} else {						
						$data 		= array(
										'created_at'		=> date('Y-m-d H:i:s'), 
										'updated_at'		=> date('Y-m-d H:i:s'),
										'date'				=> $date, 
										'set_trailler' 		=> $set_trailler,
										'unit_id' 			=> $unit_id,
										'no_unit' 			=> $no_unit,
										'model' 			=> $model,
										'chassis_number' 	=> $chassis_number,
										'brand_state' 		=> $brand_state,
										'product' 			=> $product,
										'engine_model' 		=> $engine_model,
										'delivery' 			=> $delivery,
										'engine_number' 	=> $engine_number,
										'kw_hp_rpm' 		=> $kw_hp_rpm,
										'type' 				=> $type,
										'capacity' 			=> $capacity,
										'doc_ellipse' 		=> $doc_ellipse,
										'owner_unit' 		=> $owner_unit,
										'status_unit' 		=> $status_unit,
										'status_to_use' 	=> $status_to_use,
										'by_user'			=> $by_user
									);
									$this->Crud->insert('table_equipment', $data);
					}
				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Excellent</span> Now you have new setting maintenance!
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');

			// unlink($uploader['full_path']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function daily_plan_supplypassing()
	{
		$by_user 	= $this->session->userdata('id');

		require_once(APPPATH.'libraries/excel_reader.php');
		$config['upload_path']          = './___/uploads';
		$config['allowed_types']        = 'xls';

		$this->load->library('upload', $config);
		$result = get_date_shift();
			
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> Format excel denied!. Please change to Excel 2003 (.xls).
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}else{
			$uploader = $this->upload->data();
			$datas = new Spreadsheet_Excel_Reader($uploader['full_path']);
			$baris = $datas->rowcount($sheet_index=0);
			for ($i=7; $i <= $baris; $i++) {				
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 2) ) ));
				$shift 				= trim( $datas->val($i, 3) );
				$material 			= trim( $datas->val($i, 4) );
				$rom				= trim( $datas->val($i, 5) );
				$jam_1 				= trim( $datas->val($i, 6) );
				$jam_2 				= trim( $datas->val($i, 7) );
				$jam_3 				= trim( $datas->val($i, 8) );
				$jam_4 				= trim( $datas->val($i, 9) );
				$jam_5 				= trim( $datas->val($i, 10) );
				$jam_6 				= trim( $datas->val($i, 11) );
				$jam_7 				= trim( $datas->val($i, 12) );
				$jam_8 				= trim( $datas->val($i, 13) );
				$jam_9 				= trim( $datas->val($i, 14) );
				$jam_10				= trim( $datas->val($i, 15) );
				$jam_11 			= trim( $datas->val($i, 16) );
				$jam_12 			= trim( $datas->val($i, 17) );
				

				if ($material != '' && $rom != '') {

					$src  	= $this->Crud->search('table_supplaypassing', array(
						'date'			=> $date, 
						'shift'			=> $shift, 
						'material'		=> $material,
						'rom'			=> $rom,
						'deleted_at' 	=> NULL));
					if ($src->num_rows() > 0 ) {
						$x 			= $src->row_array();
						$data 		= array(
										'updated_at'	=> date('Y-m-d H:i:s'),
										'jam_1'			=> $jam_1,
										'jam_2'			=> $jam_2,
										'jam_3'			=> $jam_3,
										'jam_4'			=> $jam_4,
										'jam_5'			=> $jam_5,
										'jam_6'			=> $jam_6,
										'jam_7'			=> $jam_7,
										'jam_8'			=> $jam_8,
										'jam_9'			=> $jam_9,
										'jam_10'		=> $jam_10,
										'jam_11'		=> $jam_11,
										'jam_12'		=> $jam_12,
										'by_user'		=> $by_user
									);
									$this->Crud->update('table_supplaypassing', array('id' => $x['id']), $data);
					} else {						
						$data 		= array(
										'created_at'	=> date('Y-m-d H:i:s'), 
										'updated_at'	=> date('Y-m-d H:i:s'), 
										'date'			=> $date,
										'shift'			=> $shift,
										'material'		=> $material,
										'rom'			=> $rom,
										'jam_1'			=> $jam_1,
										'jam_2'			=> $jam_2,
										'jam_3'			=> $jam_3,
										'jam_4'			=> $jam_4,
										'jam_5'			=> $jam_5,
										'jam_6'			=> $jam_6,
										'jam_7'			=> $jam_7,
										'jam_8'			=> $jam_8,
										'jam_9'			=> $jam_9,
										'jam_10'		=> $jam_10,
										'jam_11'		=> $jam_11,
										'jam_12'		=> $jam_12,
										'by_user'		=> $by_user
									);
									$this->Crud->insert('table_supplaypassing', $data);
					}
				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Excellent</span> Now you have new setting maintenance!
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');

			// unlink($uploader['full_path']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function setting_unit_operasi()
	{
		$by_user 	= $this->session->userdata('id');

		require_once(APPPATH.'libraries/excel_reader.php');
		$config['upload_path']          = './___/uploads';
		$config['allowed_types']        = 'xls';

		$this->load->library('upload', $config);
		$this->load->model('Import_model','import');

		$result = get_date_shift();
			
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> Format excel denied!. Please change to Excel 2003 (.xls).
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}else{
			$uploader = $this->upload->data();
			$datas = new Spreadsheet_Excel_Reader($uploader['full_path']);
			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 1) ) ));
				$unit 				= trim( $datas->val($i, 3) );
				if ($unit) {
					$this->import->import_setting_daily_register($date,$unit,'Register','',$by_user);
				}
			}


			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 1) ) ));
				$unit 				= trim( $datas->val($i, 6) );
				$remark 				= trim( $datas->val($i, 7) );
				if ($unit) {
					$this->import->import_setting_daily_register($date,$unit,'Unregister',$remark,$by_user);
				}
			}

			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 1) ) ));
				$unit 				= trim( $datas->val($i, 10) );
				if ($unit) {
					$this->import->import_setting_daily_register($date,$unit,'Floating','',$by_user);
				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Excellent</span> Now you have new setting maintenance!
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');

			// unlink($uploader['full_path']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function daily_shift_operations()
	{
		$by_user 	= $this->session->userdata('id');

		require_once(APPPATH.'libraries/excel_reader.php');
		$config['upload_path']          = './___/uploads';
		$config['allowed_types']        = 'xls';

		$this->load->library('upload', $config);
		$result = get_date_shift();
			
		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> Format excel denied!. Please change to Excel 2003 (.xls).
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		}else{
			$uploader = $this->upload->data();
			$datas = new Spreadsheet_Excel_Reader($uploader['full_path']);
			$baris = $datas->rowcount($sheet_index=0);
			for ($i=6; $i <= $baris; $i++) {				
				$date 				= date("Y-m-d", strtotime( trim( $datas->val($i, 2) ) ));
				$code_number		= trim( $datas->val($i, 3) );
				$no_unit			= trim( $datas->val($i, 4) );
				$no_id 				= trim( $datas->val($i, 5) );
				$time 				= trim( $datas->val($i, 6) );
				$csa 				= trim( $datas->val($i, 7) );
				

				if ($code_number != '') {

					$src  	= $this->Crud->search('table_shiftoperations', array(
						'date'			=> $date, 
						'code_number'	=> $code_number, 
						'deleted_at' 	=> NULL));
					if ($src->num_rows() > 0 ) {
						$x 			= $src->row_array();
						$data 		= array(
										'updated_at'	=> date('Y-m-d H:i:s'),
										'code_number'	=> $code_number,
										'no_unit'		=> $no_unit,
										'no_id'			=> $no_id,
										'time'			=> $time,
										'csa'			=> $csa,
										'by_user'		=> $by_user
									);
									$this->Crud->update('table_shiftos', array('id' => $x['id']), $data);
					} else {						
						$data 		= array(
										'created_at'	=> date('Y-m-d H:i:s'), 
										'updated_at'	=> date('Y-m-d H:i:s'),
										'date'			=> $date, 
										'code_number'	=> $code_number,
										'no_unit'		=> $no_unit,
										'no_id'			=> $no_id,
										'time'			=> $time,
										'csa'			=> $csa,
										'by_user'		=> $by_user
									);
									$this->Crud->insert('table_shiftos', $data);
					}
				}
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	            <span class="badge badge-pill badge-success">Excellent</span> Now you have new setting maintenance!
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');

			// unlink($uploader['full_path']);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

}
