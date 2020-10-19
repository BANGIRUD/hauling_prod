<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function shift_operations($id = 1)
	{
		$this->load->model('Shift_operations', 'operation');

		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$data = $this->operation->detail_shift_operations($id)->result();
		$data = $data[0];
		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
            	<div class="row">
	              	<div class="col-xs-3">
	              		<label>Datetime</label>
	              		<input class="form-control" type="text" name="datetime" placeholder="Enter Datetime Here" id="datetime" value="<?= $data->created_at ;?>">
	              	</div>
            		<div class="col-xs-3">
                		<label>ID Unit</label> 
		            	<input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>" readonly>
              		</div>
	              	<div class="col-xs-3">
	                <label>Cargo Muatan</label> 
	                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
							<?php foreach ($cargo_muatan as $value) {
								$selected = $data->cargo == $value['name'] ? ' selected' : '';
								echo '<option value="'.$value['name'].'"'.$selected.'>'.$value['name'].'</option>';
							}
							?>
						</select>                
	              	</div>
          			<div class="col-xs-3">
	                	<label>Rom</label> 
		              	<select class="form-control" name="rom" id="rom">
							<?php foreach ($rom as $value) {
								$selected = $data->to_rom == $value['id'] ? ' selected' : '';
								echo '<option'.$selected.' value="'.$value['id'].'">'.$value['name'].'</option>';
							}
							?>
						</select>
	              	</div>
          		</div>
          	</div>		
          </div>
        </div>

        <script type="text/javascript">
				$('.datepicker').datepicker({
				      autoclose: true
				    })
			</script>
		<?php 
	}

	public function monitoring_operations($id = 1)
	{
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();

		$this->load->model('Shift_operations', 'operation');

		$data = $this->operation->detail_shift_operations($id)->result();
		$data = $data[0];

		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-4">
                <label>ID Unit</label> 
		            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>" disabled>
              </div>
              <div class="col-xs-4">
                <label>Cargo Muatan</label> 
                
	            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cargo ;?>" disabled>
		        </div>
              <div class="col-xs-4">
                <label>Code Standby</label> 
	              	<select class="form-control" name="code_standby" id="code_standby">
						<?php foreach ($code_standby as $value) {
							$selected = $data->code_stby == $value['code'] ? ' selected' : '';
							echo '<option'.$selected.' value="'.$value['code'].'">'.$value['code'].'</option>';
						}
						?>
					</select>
              </div>
            </div>
          </div>
        </div>
        <?php
	}

	public function monitoring_operations_34($id = 1)
	{
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();

		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->detail_monitoring_operations_34($id)->result();
		$data = $data[0];

		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-4">
                <label>ID Unit</label> 
		            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>" disabled>
              </div>
              <div class="col-xs-4">
                <label>Cargo Muatan</label>                
	            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cargo ;?>" disabled>
		        </div>
              <div class="col-xs-4">
                <label>Code Standby</label> 
	              	<select class="form-control" name="code_standby" id="code_standby">
						<?php foreach ($code_standby as $value) {
							$selected = $data->code_stby == $value['code'] ? ' selected' : '';
							echo '<option'.$selected.' value="'.$value['code'].'">'.$value['code'].'</option>';
						}
						?>
					</select>
              </div>
            </div>
          </div>
        </div>
        <?php
	}

	public function monitoring_operations_34_standby($id)
	{
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
		$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();

		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->detail_operations_34_standby($id)->result();
		$data = $data[0];
		?>
		
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
			<div class="form-group">
            	<div class="form-body">
            		<div class="row">
                		<div class="col-xs-3">
                  			<label>Date</label>
	                		<div class="input-group date">
	                  			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
	                  			<input type="text" class="form-control pull-right datepicker"  name="date" value="<?= date('m/d/Y', strtotime($data->created_at)) ;?>">
	                		</div>
                		</div>
              		</div>
            	</div>
          	</div>
          	<div class="form-group">
            	<div class="form-body">
            		<div class="row">
                		<div class="col-xs-3">
                  			<label>ID Unit</label> 
                  			<input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>">
                		</div>
	                	<div class="col-xs-3">
	                  		<label>Posisi (M/K)</label> 
	                  		<select class="form-control" name="position" id="position">
							<?php foreach ($position as $value) {
								$selected = $data->position == $value['name'] ? ' selected' : '';
								echo'<option value="'.$value['code'].'"'.$selected.' >'.$value['name'].'</option>';
							}
							?>
							</select>
	                	</div>
	                	<div class="col-xs-3">
	                  		<label>Cargo Muatan</label> 
	                  		<select class="form-control" name="cargo_muatan" id="cargo_muatan">
							<?php foreach ($cargo_muatan as $value) {
								$selected = $data->cargo == $value['name'] ? ' selected' : '';
								echo '<option'.$selected.' value="'.$value['name'].'">'.$value['name'].'</option>';
							}
							?>
							</select>
	                	</div>
	                	<div class="col-xs-3">
	                  		<label>Code Standby</label> 
	                  		<select class="form-control" name="code_standby" id="code_standby">
							<?php foreach ($code_standby as $value) {
								$selected = $data->code_stby == $value['code'] ? ' selected' : '';
								echo '<option'.$selected.' value="'.$value['code'].'">'.$value['code'].' | '.$value['name'].'</option>';
							}
							?>
							</select>
	                	</div>
              		</div>
            	</div>
          	</div>
          	<div class="form-group">
            	<div class="form-body">
            		<div class="row">
                		<div class="col-xs-12">
                  			<label>Remark</label>
                  			<textarea name="remark" class="form-control" placeholder="Enter Remark Here ..." id="remark"><?= $data->remark ;?></textarea>
                		</div>
	               	</div>
            	</div>
          	</div>
        </div>
        <?php
	}

	public function monitoring_operations_65($id = 1)
	{
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();

		$this->load->model('Monitoring_operations', 'operations');
		
		$data = $this->operations->detail_monitoring_operations_65($id)->result();
		$data = $data[0];

		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-4">
                <label>ID Unit</label> 
		            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>" disabled>
              </div>
              <div class="col-xs-4">
                <label>Cargo Muatan</label>                
	            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cargo ;?>" disabled>
		        </div>
              <div class="col-xs-4">
                <label>Code Standby</label> 
	              	<select class="form-control" name="code_standby" id="code_standby">
						<?php foreach ($code_standby as $value) {
							$selected = $data->code_stby == $value['code'] ? ' selected' : '';
							echo '<option'.$selected.' value="'.$value['code'].'">'.$value['code'].'</option>';
						}
						?>
					</select>
              </div>
            </div>
          </div>
        </div>
        <?php
	}
}