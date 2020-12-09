<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->load->model('Crud');
		$this->by_user 		= $this->session->userdata('id');
		$this->by_area 		= $this->session->userdata('area');
		$this->by_rom 		= $this->session->userdata('rom');
		$this->username 	= $this->session->userdata('username');
		$this->level 		= $this->session->userdata('level');
		$page 		= 'Dashboard';

		if ($this->level == '' && $this->username == '') {
			redirect(base_url('Auth'));
		} 
	}
	
	public function index()
	{	
		$this->load->model('Monitoring_model', 'monitoring');
		$csa_69		 = $this->monitoring->monitoring_csa(12);
		$csa_65 	 = $this->monitoring->monitoring_csa(11);
		$l_csa_65 	 = $this->monitoring->monitoring_csa(11, 'L');
		$csa_34 	 = $this->monitoring->monitoring_csa(10);
		$l_csa_34 	 = $this->monitoring->monitoring_csa(10, 'L');


		$total_csa_69 = $this->monitoring->total_monitoring(12)->row_array();
		$total_csa_65 = $this->monitoring->total_monitoring(11)->row_array();
		$total_csa_34 = $this->monitoring->total_monitoring(10)->row_array();

		print_r($_SESSION);

		$data = array(
			'csa_69' 	=> $csa_69,
			'csa_65' 	=> $csa_65,
			'l_csa_65' 	=> $l_csa_65,
			'csa_34' 	=> $csa_34,
			'l_csa_34' 	=> $l_csa_34,
			'total_csa_69' => $total_csa_69,
			'total_csa_65' => $total_csa_65,
			'total_csa_34' => $total_csa_34
		);
		$this->load->view('framework/header', array('title' => 'Monitoring'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dashboard/monitoring_unit_csa', $data);
		$this->load->view('framework/footer');
	}


	public function record_production()
	{
		$result 			= get_date_shift();	
		$by_area			= $this->session->userdata('area');
		$date  				= $result['date'];
		$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->record_production()->result_array();

		$data 		= array (
			'dateid' 			=> $result['date'],
			'cargo_muatan'		=> $cargo_muatan,
			'rom'				=> $rom,
			'data'				=> $data,
		);

		$this->load->view('framework/header', array('title' => 'Record Production'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dispatching/record_production', $data);
		$this->load->view('framework/footer');	
	}

	public function multiple_record_production()
	{
		$result 			= get_date_shift();	
		$by_area			= $this->session->userdata('area');
		$date  				= $result['date'];
		$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->record_production()->result_array();

		$data 		= array (
			'dateid' 			=> $result['date'],
			'cargo_muatan'		=> $cargo_muatan,
			'rom'				=> $rom,
			'data'				=> $data,
		);
			
		$this->load->view('framework/header', array('title' => 'Add Multiple Unit'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dispatching/record_multiple_production', $data);
		$this->load->view('framework/footer');	
	}

	public function monitoring_data_production()
	{
		$this->load->model('Monitoring_model', 'monitoring');
		$this->load->model('Shift_operations', 'shift_ops');		
		$this->load->model('Supplay_passing_model', 'spp');

		$result = get_date_shift();
		$date = $this->input->get('date') == '' ? $result['date'] : date('Y-m-d', strtotime($this->input->get('date')));
		$shift = $this->input->get('shift') == '' ? $result['shift'] : $this->input->get('shift');
		$hour = $this->input->get('time') == '' ? date('H') : $this->input->get('time');

		if ($shift == 1) {
			$jam = 4;
			$limit = 12;
		} else {
			$jam = 16;
			$limit = 12;
		}

		$rom	  	= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$pos		= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$shift_code	= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();

		$table_rom = $this->monitoring->rom_supplaypassing($date, $shift);

		$data  = array(
			'hour'			=> $result['hour'],
			'shift' 		=> $result['shift'],
			'shift_code'	=> $shift_code,
			'rom'			=> $rom,
			'jam'			=> $jam,
			'limit'			=> $limit,
			'pos'			=> $pos,
			'date'  		=> $date,
			'shift'  		=> $shift,
			'hour'  		=> $hour,
			'table_rom'		=> $table_rom
		);

		$this->load->view('framework/header', array('title' => 'Monitoring Data'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dispatching/monitoring_data', $data);
		$this->load->view('framework/footer');
	}

	public function achievement_seam_series()
	{
		$result = get_date_shift();

		$shift = $this->input->get('shift') == '' ? $result['shift'] : $this->input->get('shift');
		if ($shift == 1) {
			$jam = 4;
			$limit = 12;
		} else {
			$jam = 16;
			$limit = 12;
		}


		$date = $this->input->get('date') == '' ? $result['date'] : date('Y-m-d', strtotime($this->input->get('date')));
		$hour = $this->input->get('time') == '' ? date('H') : $this->input->get('time');
		$this->load->model('Monitoring_model', 'monitoring');


		$table = $this->monitoring->achievement_seam_series($date, $shift)->result_array();

		
		$rom	  	= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$pos		= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$shift_code	= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		
		$data  = array(
			'hour'			=> $result['hour'],
			'shift' 		=> $result['shift'],
			'table'			=> $table,
			'shift_code'	=> $shift_code,
			'rom'			=> $rom,
			'jam'			=> $jam,
			'limit'			=> $limit,
			'pos'			=> $pos,
			'date'  		=> $date,
			'shift'  		=> $shift,
			'hour'  		=> $hour,


		);

		$this->load->view('framework/header', array('title' => 'Achievement Seam Series'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dispatching/achievement_seam_series',$data);
		$this->load->view('framework/footer');
	}

	public function rtk_rom()
	{
		$result = get_date_shift();
		$date = $this->input->get('date') == '' ? $result['date'] : date('Y-m-d', strtotime($this->input->get('date')));
		$shift = $this->input->get('shift') == '' ? $result['shift'] : $this->input->get('shift');
		$hour = $this->input->get('time') == '' ? date('H') : $this->input->get('time');
		$this->load->model('Monitoring_model', 'monitoring');
		$this->load->model('Shift_operations', 'shift_ops');


		$table = $this->monitoring->achievement_seam_series($date, $shift)->result_array();

		if ($shift == 1) {
			$jam = 4;
			$limit = 12;
		} else {
			$jam = 16;
			$limit = 12;
		}

		$rom	  	= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$pos		= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$shift_code	= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		
		$data  = array(
			'hour'			=> $result['hour'],
			'shift' 		=> $result['shift'],
			'table'			=> $table,
			'shift_code'	=> $shift_code,
			'rom'			=> $rom,
			'jam'			=> $jam,
			'limit'			=> $limit,
			'pos'			=> $pos,
			'date'  		=> $date,
			'shift'  		=> $shift,
			'jam'  			=> $hour,


		);
		
		$this->load->view('framework/header', array('title' => 'Dashoard RTK ROM'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dispatching/rtk_rom',$data);
		$this->load->view('framework/footer');
	}

	public function report_production()
	{
		# code...
	}

	public function post_34_muatan()
	{
		$by_level  = $this->session->userdata('level');
		$result 			= get_date_shift();
		$date  				= $result['date'];
		$position			= $this->Crud->search('table_enum', array('type' => 'position'))->result_array();
		$code_standby		= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();	
	

		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->monitoring_operations_34_muatan()->result_array();
		
		$data 		= array (
			'dateid' 			=> $result['date'],
			'data'				=> $data,
			'position'			=> $position,
			'code_standby'		=> $code_standby
		);

		$this->load->view('framework/header', array('title' => 'Post KM 34 Muatan'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/post_34_muatan',$data);
		$this->load->view('framework/footer');
	}

	public function post_34_standby()
	{
		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->monitoring_operations_34_standby()->result_array();

		$data 		= array (
			'data'				=> $data
		);

		$this->load->view('framework/header', array('title' => 'Post KM 34 Standby'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/post_34_standby',$data);
		$this->load->view('framework/footer');
	}

	public function post_65_muatan()
	{
		$by_level  = $this->session->userdata('level');
		$result 			= get_date_shift();
		$date  				= $result['date'];
		$position			= $this->Crud->search('table_enum', array('type' => 'position'))->result_array();
		$code_standby		= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();	
	

		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->monitoring_operations_65_muatan()->result_array();
		
		$data 		= array (
			'dateid' 			=> $result['date'],
			'data'				=> $data,
			'position'			=> $position,
			'code_standby'		=> $code_standby
		);
		
		$this->load->view('framework/header', array('title' => 'Post KM 65 Muatan'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/post_65_muatan',$data);
		$this->load->view('framework/footer');
	}

	public function post_65_standby()
	{
		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->monitoring_operations_65_standby()->result_array();

		$data 		= array (
			'data'				=> $data
		);

		$this->load->view('framework/header', array('title' => 'Post KM 65 Standby'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/post_65_standby',$data);
		$this->load->view('framework/footer');
	}

	public function post_69($code = '')
	{
		$position	  	= $this->Crud->search('table_enum', array('type' => 'position'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();

		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->monitoring_operations_69($code)->result_array();

		$data 		= array (
			'position'		=> $position,
			'code_standby'	=> $code_standby,
			'data'			=> $data,
		);

		$this->load->view('framework/header', array('title' => 'Post KM 69'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/post_69',$data);
		$this->load->view('framework/footer');
	}

	public function monitoring_passing()
	{
		$result = get_date_shift();
		$shift  = $result['shift'];
		if ($this->session->userdata('level') == '') {
			# code...
		}
		$this->db->where("name IN ('KM 65', 'KM 34')", NULL);
		$pos	= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$shift_code	  	= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();

		$model_monitoring = $this->load->model('Monitoring_model', 'monitoring');

		$data = array(
			'shift' 		=> $shift,
			'pos'			=> $pos,
			'shift_code'	=> $shift_code,
			'monitoring'	=> $model_monitoring
		);
		
		$this->load->view('framework/header', array('title' => 'Monitoring Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/monitoring_passing',$data);
		$this->load->view('framework/footer');
	}

	public function quality_control_passing()
	{
		$result = get_date_shift();
		$shift  = $result['shift'];
		$pos	= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$shift_code	  	= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();

		$this->load->model('Monitoring_model', 'monitoring');

		$data = $this->monitoring->supplay_passing()->result_array();

		$data = array(
			'shift' 		=> $shift,
			'shift_code'	=> $shift_code,
			'pos'			=> $pos,
			'data' 			=> $data
		);

		$this->load->view('framework/header', array('title' => 'Quality Control Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/quality_control_passing',$data);
		$this->load->view('framework/footer');
	}

	public function achievement_passing()
	{
		$result 		= get_date_shift();
		$date  			= $result['date'];
		$shift  		= $result['shift'];
		$pos			= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();

		$status_passing	= $this->Crud->search('table_enum', array('type' => 'status_passing'))->result_array();

		$this->load->model('Monitoring_model', 'monitoring');

		$data = $this->monitoring->hour_supplay_passing()->result_array();

		$data = array(
			'date' 				=> $date,
			'shift' 			=> $shift,
			'status_passing'	=> $status_passing,
			'pos'				=> $pos,
			'rows' 				=> $data
		);


		$this->load->view('framework/header', array('title' => 'Dashboard Achievement Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/post/achievement_passing',$data);
		$this->load->view('framework/footer');
	}

	public function record_rom($by_rom = "")
	{
		$result 			= get_date_shift();
		
		$date  				= $result['date'];
		$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$by_rom				= $by_rom == '' ?$this->session->userdata('rom') : $by_rom;

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->rom_monitoring_shift_operations($by_rom)->result_array();

		$data 		= array (
			'dateid' 			=> $result['date'],
			'cargo_muatan'		=> $cargo_muatan,
			'rom'				=> $rom,
			'data'				=> $data,
			'by_rom'			=> $by_rom
		);

		$this->load->view('framework/header', array('title' => 'Record ROM'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/rom/record_rom',$data);
		$this->load->view('framework/footer');
	}

	public function report_rom($by_rom="")
	{
		$result 			= get_date_shift();
		$by_rom				= $by_rom == '' ?$this->session->userdata('rom') : $by_rom;
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$date = $this->input->get('date') == '' ? $result['date'] : date('Y-m-d', strtotime($this->input->get('date')));
		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->report_rom_monitoring_shift_operations($by_rom)->result_array();

		$data 		= array (
			'rom'			=> $rom,
			'date'			=> $date,
			'data'			=> $data,
		);

		$this->load->view('framework/header', array('title' => 'Report Monitoring ROM'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/rom/report_rom',$data);
		$this->load->view('framework/footer');

	}

	public function user()
	{
		$level = $this->Crud->search('table_enum', array('type' => 'level'))->result_array();
		
		$this->load->model('Account_control', 'user');
		$data = $this->user->detail_user()->result_array();

		$data = array(
			'level'	=> $level,
			'data'	=> $data

		);

		$this->load->view('framework/header', array('title' => 'User'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/user',$data);
		$this->load->view('framework/footer');
	}

	public function populasi_unit()
	{
		$result = get_date_shift();

		$this->db->select('table_equipment.*');
		$this->db->from('table_equipment');
		$this->db->where('`table_equipment`.`deleted_at` IS NULL');
		$table = $this->db->get()->result_array();

		$data = array (
			'table' => $table,
		);

		$this->load->view('framework/header', array('title' => 'Populasi Unit'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/populasi_unit', $data);
		$this->load->view('framework/footer');
	}

	public function raw_material()
	{

		$data['rows'] = $this->Crud->search('table_enum', array('table_enum.type' => 'cargo_muatan', 'deleted_at' => NULL))->result_array();
		$data['roms'] = $this->Crud->search('table_enum', array('table_enum.type' => 'rom', 'deleted_at' => NULL))->result_array();
		$this->load->view('framework/header', array('title' => 'Raw Material'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/raw_material', $data);
		$this->load->view('framework/footer');
	}

	public function setting_unit_operasi()
	{
		$this->load->model('Setting_daily_model', 'setting_daily');
		$result 	= get_date_shift();
		$csa 		=	$this->Crud->search('enum', array('type' => 'csa', 'deleted_at' => NULL))->result_array();
		$register 	=	$this->Crud->search('enum', array('type' => 'register', 'deleted_at' => NULL))->result_array();

		
		$table = $this->setting_daily->show_operation()->result_array();

		$data 				= array(
			'table'			=> $table,
			'csa'			=> $csa,
			'register'		=> $register,

		);

		$this->load->view('framework/header',array('title' => 'Setting Unit Operasi'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/setting_unit', $data);
		$this->load->view('framework/footer');	
	}

	public function plan_supplypassing()
	{
		$result = get_date_shift();
		$this->load->model('Supplay_passing_model', 'supplay');
		$table = $this->supplay->show_data()->result_array();

		$data  = array(
			'hour'	=> $result['hour'],
			'shift' => $result['shift'],
			'table'	=> $table
		);
			
		$this->load->view('framework/header', array('title' => 'Daily Plan Supplay Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/supplay_passing', $data);
		$this->load->view('framework/footer');
	}

	public function overshift_unit()
	{
		$csa 		=	$this->Crud->search('enum', array('type' => 'csa', 'deleted_at' => NULL))->result_array();
		$data		= array(
			'csa'		=> $csa,


		);

		$this->load->view('framework/header', array('title' => 'Plan Daily Overshift'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/overshift_unit', $data);
		$this->load->view('framework/footer');	
	}

	public function quality()
	{
		$result =  get_date_shift();
		$material_new	= $this->Crud->search('enum', array('type' => 'material_new'))->result_array();

		$this->db->select('table_quality.*,cargo.description as color');
		$this->db->from('table_quality');
		$this->db->join('table_enum as cargo','table_quality.series = cargo.name','LEFT');
		$this->db->where('table_quality. deleted_at is NULL');
		$this->db->where('table_quality. date = \''.$result['date'].'\'');
		$table = $this->db->get()->result_array();

		$data = array(
			'table' => $table,
			'material_new' => $material_new
		);

		$this->load->view('framework/header', array('title' => 'Database Quality'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/admin/database_quality', $data);
		$this->load->view('framework/footer');
	}

	public function profile($user='')
	{
		$level 	= $this->session->userdata('level');
		if ($level == 'supervisor' || $level == 'administrator') {
			if ($user == '') {
				$username = $this->session->userdata('username');
			} else {
				$username = $user;
			}
		} else {
			$username 	= $this->session->userdata('username');
		}
		$this->db->select('table_users.id ,table_users.username, table_users.full_name, table_users.description, table_enum.name  as level');
		$this->db->from('table_users');
		$this->db->join('table_enum', 'table_users.level  = table_enum.id', 'LEFT');
		$this->db->where('table_users.username',$username);
		$profile = $this->db->get()->row_array();

		$this->load->view('framework/header', array('title' => 'Profile'));
		$data = array(
			'userprofile' => $this->session->userdata('username'),
			'username' => $username,
			'data' => $profile,
		);
		$this->load->view('pages/admin/profile', $data);
	}

}







	// public function daily_monitoring_operations_standby($code = '')
	// {
	// 	$result 		= get_date_shift();	
	// 	$by_area		= $this->session->userdata('area');
	// 	$by_user		= $this->session->userdata('id');
	// 	$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
	// 	$area			= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
	// 	$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
	// 	$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
	// 	$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();

	// 	// $this->load->model('Monitoring_operations', 'operations');
	// 	// $data = $this->operations->detail_monitoring_operations_standby($by_area, $code)->result_array();

	// 	// $data 		= array (
	// 	// 	'dateid' 			=> $result['date'],
	// 	// 	'shift'	 			=> $shift,
	// 	// 	'area'	 			=> $area,
	// 	// 	'cargo_muatan'		=> $cargo_muatan,
	// 	// 	'position'			=> $position,
	// 	// 	'data'				=> $data,
	// 	// 	'code_standby'		=> $code_standby,
	// 	// );

	// 	$this->load->view('framework/header', array('title' => 'Monitoring Pos Standby'));
	// 	$this->load->view('framework/sidebar');
	// 	$this->load->view('pages/daily_monitoring_operations_standby');
	// 	$this->load->view('framework/footer');
	// }



	// public function daily_monitoring_operations($position = "K", $by_area = "")
	// {
	// 	$by_level  = $this->session->userdata('level');
	// 	$result 			= get_date_shift();	
	// 	// $by_area			= $by_area == '' ? $this->session->userdata('area') : $by_area;
	// 	// $code				= $code == '' ? "L" : $code;
	// 	$date  				= $result['date'];
	// 	$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
	// 	$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();		
	// 	$area 				= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();

	// 	$this->load->model('Shift_operations', 'operations');
		
	// 	$data = $this->operations->monitoring_shift_operations($position,$by_area)->result_array();
		

	// 	$data 		= array (
	// 		'dateid' 			=> $result['date'],
	// 		'cargo_muatan'		=> $cargo_muatan,
	// 		'rom'				=> $rom,
	// 		'data'				=> $data,			
	// 		'area'				=> $area,
	// 		'position'			=> $position
	// 	);

	// 	$this->load->view('framework/header', array('title' => 'Monitoring Post'));
	// 	$this->load->view('framework/sidebar');
	// 	$this->load->view('pages/daily_monitoring_operations',$data);
	// 	$this->load->view('framework/footer');
	// }
