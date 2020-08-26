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
		$this->load->view('pages/daily_monitoring_unit_csa', $data);
		$this->load->view('framework/footer');
	}


	public function daily_record_production()
	{
		$result 			= get_date_shift();	
		$by_area			= $this->session->userdata('area');
		$date  				= $result['date'];
		$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->daily_record_production()->result_array();

		$data 		= array (
			'dateid' 			=> $result['date'],
			'cargo_muatan'		=> $cargo_muatan,
			'rom'				=> $rom,
			'data'				=> $data,
		);

		$this->load->view('framework/header', array('title' => 'Record Production'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_record_production', $data);
		$this->load->view('framework/footer');	
	}

	public function daily_monitoring_operations($position = "K", $by_area = "")
	{
		$by_level  = $this->session->userdata('level');
		$result 			= get_date_shift();	
		// $by_area			= $by_area == '' ? $this->session->userdata('area') : $by_area;
		// $code				= $code == '' ? "L" : $code;
		$date  				= $result['date'];
		$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();		
		$area 				= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();

		$this->load->model('Shift_operations', 'operations');
		
		$data = $this->operations->monitoring_shift_operations($position,$by_area)->result_array();
		

		$data 		= array (
			'dateid' 			=> $result['date'],
			'cargo_muatan'		=> $cargo_muatan,
			'rom'				=> $rom,
			'data'				=> $data,			
			'area'				=> $area,
			'position'			=> $position
		);

		$this->load->view('framework/header', array('title' => 'Monitoring Post'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_monitoring_operations',$data);
		$this->load->view('framework/footer');
	}

	public function daily_rom_operations()
	{
		$result 			= get_date_shift();
		
		$date  				= $result['date'];
		$cargo_muatan		= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->rom_monitoring_shift_operations($this->by_rom)->result_array();

		$data 		= array (
			'dateid' 			=> $result['date'],
			'cargo_muatan'		=> $cargo_muatan,
			'rom'				=> $rom,
			'data'				=> $data,
		);

		$this->load->view('framework/header', array('title' => 'Monitoring ROM'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_rom_monitoring',$data);
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
		$this->load->view('pages/populasi_unit', $data);
		$this->load->view('framework/footer');
	}

	public function raw_material()
	{

		$data['rows'] = $this->Crud->search('table_enum', array('table_enum.type' => 'cargo_muatan', 'deleted_at' => NULL))->result_array();
		$this->load->view('framework/header', array('title' => 'Raw Material'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/raw_material', $data);
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
		$this->load->view('pages/daily_setting_unit_operasi', $data);
		$this->load->view('framework/footer');	
	}

	public function daily_plan_supplypassing()
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
		$this->load->view('pages/daily_plan_supplypassing', $data);
		$this->load->view('framework/footer');
	}


	public function daily_overshift_unit()
	{
		$csa 		=	$this->Crud->search('enum', array('type' => 'csa', 'deleted_at' => NULL))->result_array();	


		$data	= array(
			'csa'		=> $csa,

		);

		$this->load->view('framework/header', array('title' => 'Plan Daily Overshift'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_overshift_unit', $data);
		$this->load->view('framework/footer');	
	}

	public function quality()
	{
		$result =  get_date_shift();
		$material_new	= $this->Crud->search('enum', array('type' => 'material_new'))->result_array();

		$this->db->select('table_quality.*');
		$this->db->from('table_quality');
		$this->db->where('table_quality. deleted_at is NULL');
		$table = $this->db->get()->result_array();

		$data = array(
			'table' => $table,
			'material_new' => $material_new
		);

		$this->load->view('framework/header', array('title' => 'Database Quality'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/quality', $data);
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
		$this->db->select('table_users.id ,table_users.username, table_users.full_name, table_users.description, enum.name  as level');
		$this->db->from('table_users');
		$this->db->join('enum', 'table_users.level  = enum.id', 'LEFT');
		$this->db->where('table_users.username',$username);
		$profile = $this->db->get()->row_array();

		$this->load->view('framework/header', array('title' => 'ReportingMDI | Profile'));
		$data = array(
			'userprofile' => $this->session->userdata('username'),
			'username' => $username,
			'data' => $profile,
		);
		$this->load->view('pages/profile', $data);
	}

	public function daily_monitoring_muatan()
	{
		$result = get_date_shift();
		$shift  = $result['shift'];

		$model_monitoring = $this->load->model('Monitoring_model', 'monitoring');

		$data = array(
			'shift' => $shift,
			'monitoring'	=>$model_monitoring
		);
		$this->load->view('framework/header', array('title' => 'Monitoring Muatan'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_monitoring_muatan',$data);
		$this->load->view('framework/footer');
	}

	public function daily_control_passing()
	{
		$result = get_date_shift();
		$shift  = $result['shift'];

		$this->load->model('Monitoring_model', 'monitoring');

		$data = $this->monitoring->supplay_passing()->result_array();

		$data = array(
			'shift' => $shift,
			'data' 	=> $data
		);

		$this->load->view('framework/header', array('title' => 'Quality Control Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_control_passing',$data);
		$this->load->view('framework/footer');
	}

	public function dashboard_ach_passingunit()
	{
		$result 		= get_date_shift();
		$date  			= $result['date'];
		$shift  		= $result['shift'];

		$status_passing	= $this->Crud->search('table_enum', array('type' => 'status_passing'))->result_array();

		$this->load->model('Monitoring_model', 'monitoring');

		$data = $this->monitoring->hour_supplay_passing()->result_array();

		$data = array(
			'date' 				=> $date,
			'shift' 			=> $shift,
			'status_passing'	=> $status_passing,
			'rows' 				=> $data
		);


		$this->load->view('framework/header', array('title' => 'Dashboard Achievement Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dashboard_ach_passingunit',$data);
		$this->load->view('framework/footer');
	}

	public function report_rom($by_rom='')
	{
		$result 			= get_date_shift();
		$by_rom				= $by_rom == '' ?$this->session->userdata('rom') : $by_rom;
		$rom	  			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->report_rom_monitoring_shift_operations($by_rom)->result_array();

		$data 		= array (
			'rom'			=> $rom,
			'data'			=> $data,
		);

		$this->load->view('framework/header', array('title' => 'Report Monitoring ROM'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/report_rom_monitoring',$data);
		$this->load->view('framework/footer');

	}
}