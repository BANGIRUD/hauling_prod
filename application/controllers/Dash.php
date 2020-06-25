<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->load->model('Crud');
		$username 	= $this->session->userdata('username');
		$level 		= $this->session->userdata('level');
		$page 		= 'Dashboard';

		if ($level == '' && $username == '') {
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

	public function daily_record_production($code = '')
	{
		$result 		= get_date_shift();	
		$by_area		= $this->session->userdata('area');
		$by_user		= $this->session->userdata('id');
		$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		$area			= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
		$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();

		$this->load->model('Shift_operations', 'operations');
		$data = $this->operations->daily_record_production($by_area, $code)->result_array();

		$data 		= array (
			'dateid' 			=> $result['date'],
			'shift'	 			=> $shift,
			'area'	 			=> $area,
			'cargo_muatan'		=> $cargo_muatan,
			'position'			=> $position,
			'data'				=> $data,
			'code_standby'		=> $code_standby,
		);

		$this->load->view('framework/header', array('title' => 'Record Production'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_record_production', $data);
		$this->load->view('framework/footer');	
	}

	public function daily_multiple_record_production()
	{
		$posisi		=  $this->db->from('enum')->where('type', 'posisi')->order_by('name', 'desc')->get()->result_array();
		$standby	=  $this->db->from('enum')->where('type', 'code_stby')->order_by('id', 'asc')->get()->result_array();
		$cargo		=  $this->db->from('enum')->where('type', 'material_new')->order_by('id', 'asc')->get()->result_array();

		$data 		= array (
			'posisi'		=> $posisi,
			'standby'		=> $standby,
			'cargo'			=> $cargo
		);

		$this->load->view('framework/header', array('title' => 'Add Multiple Unit'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/daily_multiple_record_production', $data);
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

	public function raw_material()
	{

		$this->load->view('framework/header', array('title' => 'Raw Material'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/raw_material');
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

		$data = $this->monitoring->hour_supplay_passing()->row_array();

		$data = array(
			'date' 				=> $date,
			'shift' 			=> $shift,
			'status_passing'	=> $status_passing,
			'data' 				=> $data
		);


		$this->load->view('framework/header', array('title' => 'Dashboard Achievement Passing'));
		$this->load->view('framework/sidebar');
		$this->load->view('pages/dashboard_ach_passingunit',$data);
		$this->load->view('framework/footer');
	}


}






































































// SELECT cargo, SUM(IF(HOUR(time_out) = 14, 1, 0)) as actual_14, COUNT(*) as total FROM `table_shiftoperations`
// WHERE date = '2020-06-04'
// GROUP BY cargo





















	// public function passing_unit()
	// {
	// 	$this->load->view('framework/header', array('title' => 'Passing Unit'));
	// 	$this->load->view('framework/sidebar');
	// 	$this->load->view('pages/passing_unit');
	// 	$this->load->view('framework/footer');
	// }









	// public function test()
	// {
	// 	$result 	= get_date_shift();	
	// 	$shift		= $this->Crud->search('enum', array('type' => 'shift'))->result_array();
	// 	$area		= $this->Crud->search('enum', array('type' => 'area'))->result_array();
	// 	$material	= $this->Crud->search('enum', array('type' => 'material'))->result_array();
	// 	$posisi		=  $this->db->from('enum')->where('type', 'posisi')->order_by('name', 'desc')->get()->result_array();

	// 	$this->db->select('table_shiftoperations.*, enum.name as position, table_settingunit.unit_id, table_settingunit.register, table_shiftos.csa, table_shiftos.time');
	// 	$this->db->from('table_shiftoperations');
	// 	$this->db->join('enum', 'table_shiftoperations.position = enum.id','LEFT');
	// 	$this->db->join('table_settingunit','table_shiftoperations.cn_unit = table_settingunit.unit_id AND  table_shiftoperations.date = table_settingunit.date','LEFT' );
	// 	$this->db->join('table_shiftos','table_shiftoperations.cn_unit = table_shiftos.cn');
	// 	// $this->db->where('table_shiftoperations.date = \''.$result['date'].'\'');

	// 	$data = $this->db->get()->result_array();

	// 	$data 		= array (
	// 		'dateid' 	=> $result['date'],
	// 		'shift'	 	=> $shift,
	// 		'area'	 	=> $area,
	// 		'material'	=> $material,
	// 		'posisi'	=> $posisi,
	// 		'data'		=> $data,
	// 	);

	// 	$this->load->view('framework/header');
	// 	$this->load->view('framework/sidebar');
	// 	$this->load->view('pages/test', $data);
	// 	$this->load->view('framework/footer');	
	// }