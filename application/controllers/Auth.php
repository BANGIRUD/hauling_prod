<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();	
		$this->load->model('Crud');
	}

	public function index($err='')
	{
		$area 		= $this->Crud->search('table_enum', array('type' => 'area', 'deleted_at' => NULL))->result_array();
		$rom 		= $this->Crud->search('table_enum', array('type' => 'rom', 'deleted_at' => NULL))->result_array();

		if ($err == 'session') {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                <b>Error!</b>. Session has expired! Please re-login :)
	                </div>');

			
		
			redirect(base_url('Auth'));
	    }
	    $data 		= array(
				'title' 	=> 'Login',
				'area' 		=> $area,
				'rom'		=> $rom,
		);
		$this->load->view('framework/head_login', $data);
		$this->load->view('Auth/login');
	}

	public function action() {
		$username 		= htmlspecialchars( trim($this->input->post('username')) );
		$password 		= htmlspecialchars( trim($this->input->post('password')) );
		$area 			= htmlspecialchars( trim($this->input->post('area')) );
		$rom 			= htmlspecialchars( trim($this->input->post('rom')) );
		
		$this->db->select('table_users.*, table_enum.name as level_description');
		$this->db->from('table_users');
		$this->db->join('table_enum', 'table_users.level = table_enum.id','LEFT');
		$this->db->where( array(
			'username' => $username,
			'table_users.deleted_at' => NULL
		) );
		$data 			= $this->db->get()->row_array();
		$this->form_validation->set_rules('username', 'username', 'required');		
		$this->form_validation->set_rules('password', 'password', 'required');
		if( $this->form_validation->run() != false ) {
			if ($data['level_description'] == 'rom' && !$rom) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                Pilih ROM terlebih dahulu!
                </div>');
				redirect(base_url('Auth'));
				return false;
			}
			if (password_verify($password, $data['password'])) {
				$this->Crud->update('table_users', array('username' => $username), array('last_login' => date('Y-m-d H:i:s', strtotime('+ 1 minutes'))));
				$session_data = array(
					'id' 				=> $data['id'],
					'username' 			=> $data['username'], 
					'full_name' 		=> $data['full_name'], 
					'description' 		=> $data['description'],
					'email' 			=> $data['email'],
					'phone' 			=> $data['phone'],
					'activation_key' 	=> $data['activation_key'],
					'area' 				=> $area,
					'rom' 				=> $rom,
					'level' 			=> $data['level_description']
				);
				$this->session->set_userdata($session_data);
				if ($data['level_description'] == 'rom') {
					redirect(base_url('Dash/daily_rom_operations'));
				}else{
					 redirect(base_url('Dash'));
				}
              

				
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                Username or password wrong!
	                </div>');
				redirect(base_url('Auth'));
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Username or password wrong!
                </div>');
			redirect(base_url('Auth'));
		}
	}

	public function logout($err = '')
	{
		$this->session->sess_destroy();
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	    foreach($cookies as $cookie) {
	        $parts = explode('=', $cookie);
	        $name = trim($parts[0]);
	        delete_cookie($name);
	        delete_cookie($name);
	    }
	    if ($err == 'session') {
	    	$err = '/index/session';
	    }
		redirect(base_url('Auth' . $err));
	}

}