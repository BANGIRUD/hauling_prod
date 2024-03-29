<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

	function __construct() {
		parent::__construct();	
		$this->load->model('Crud');
	}

	public function shift_operations() 
	{
		$id = $this->input->post('del');
		$src = $this->Crud->search('table_shiftoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$this->Crud->update('table_shiftoperations', array('id' => $id), array('deleted_at' => date('Y-m-d H:i:s')));
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data has been deleted!
              </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not ready on database!
              </div>');
		}
	}

	public function monitoring_operation_34_standby()
	{
		$id = $this->input->post('del');
		$src = $this->Crud->search('table_monitoringoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$this->Crud->update('table_monitoringoperations', array('id' => $id), array('deleted_at' => date('Y-m-d H:i:s')));
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data has been deleted!
              </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not ready on database!
              </div>');
		}
	}

	public function monitoring_operation_65_standby()
	{
		$id = $this->input->post('del');
		$src = $this->Crud->search('table_monitoringoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$this->Crud->update('table_monitoringoperations', array('id' => $id), array('deleted_at' => date('Y-m-d H:i:s')));
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data has been deleted!
              </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not ready on database!
              </div>');
		}
	}

	public function monitoring_operation_69()
	{
		$id = $this->input->post('del');
		$src = $this->Crud->search('table_monitoringoperations', array('id' => $id))->num_rows();
		if ($src > 0) {
			$this->Crud->update('table_monitoringoperations', array('id' => $id), array('deleted_at' => date('Y-m-d H:i:s')));
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data has been deleted!
              </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not ready on database!
              </div>');
		}
	}

	public function people()
	{
		$id = $this->input->post('del');
		if ($id == 1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                You can\'t delete this super user!
	              </div>');
		} else {
			$src = $this->Crud->search('table_users', array('id' => $id))->num_rows();
			if ($src > 0) {
				$this->Crud->update('table_users', array('id' => $id), array('deleted_at' => date('Y-m-d H:i:s')));
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Success!</h4>
	                People has been deleted!
	              </div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	                People not found on database!
	              </div>');
			}
		}
	}

	public function enum()
	{
		$id = $this->input->post('del');
		$src = $this->Crud->search('table_enum', array('id' => $id))->num_rows();
		if ($src > 0) {
			// $this->Crud->delete('enum', array('id' => $id));
			$this->Crud->update('table_enum', array('id' => $id), array('deleted_at' => date('Y-m-d H:i:s')));
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data has been deleted!
              </div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data not ready on database!
              </div>');
		}
	}

}
	

	