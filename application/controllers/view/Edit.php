<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function shift_operations($id) {
		$level			= $this->session->userdata('level');
		$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		$area			= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
		$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();

		$this->load->model('Shift_operations', 'operation');

		$data = $this->operation->detail_shift_operations($id)->result();
		$data = $data[0];
		?>
		
		<?php if ($level == 'Administrator'): ?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
   			<div class="modal-body">
        		<div class="form-group">
		            <div class="form-body">
		              	<div class="row">
		                	<div class="col-xs-4">
		                  		<label>Date</label>
		                		<div class="input-group date">
		                  			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
		                  			<input type="text" class="form-control pull-right datepicker"  name="date" value="<?= date('m/d/Y', strtotime($data->date)) ;?>">
		                		</div>
		                	</div>
			                <div class="col-xs-4">
			                  	<label>Shift</label>
			                  	<select class="form-control" name="shift">
									<?php foreach ($shift as $value) {
										$selected = "";
										if($data->shift == $value['id']) $selected = " selected";
										echo '<option value="'.$value['code'].'"'.$selected.'>'.$value['name'].'</option>';
									}
									?>
								</select>
			                </div>  
			                <div class="col-xs-4">
			                  	<label>Area</label>
			                  	<select class="form-control" name="area">
									<?php foreach ($area as $value) {
										$selected = "";
										if($data->location == $value['id']) $selected = " selected";
										echo '<option value="'.$value['id'].'"'.$selected.'>'.$value['name'].'</option>';
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
		                	<div class="col-xs-4">
		                  		<label>ID Unit</label> 
		                  		<input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>">
		                	</div>
			                <div class="col-xs-4">
			                  	<label>Posisi (M/K)</label> 
			                  	<select class="form-control" name="position" id="position">
									<?php foreach ($position as $value) {
										$selected = $data->position == $value['name'] ? ' selected' : '';
										echo'<option value="'.$value['code'].'"'.$selected.' >'.$value['name'].'</option>';
									}
									?>
								</select>
			                </div>
			                <div class="col-xs-4">
			                  	<label>Cargo Muatan</label> 
			                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
									<?php foreach ($cargo_muatan as $value) {
										$selected = $data->cargo == $value['name'] ? ' selected' : '';
										echo '<option'.$selected.' value="'.$value['name'].'">'.$value['name'].'</option>';
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
		        <div class="form-group">
		        	<div class="form-body">
		            	<div class="row">
		                	<div class="col-xs-4">
		                  		<label>Date In</label> 
		                    	<div class="input-group date">
			                      	<div class="input-group-addon">
			                        	<i class="fa fa-calendar"></i>
			                      	</div>
			                      	<input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="<?= date('m/d/Y', strtotime($data->time_in)) ;?>">
		                    	</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time In</label>
		                    		<div class="input-group">
			                      		<input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in" value="<?= date('H:i', strtotime($data->time_in)) ;?>">
			                      		<div class="input-group-addon">
			                        		<i class="fa fa-clock-o"></i>
			                      		</div>
		                    		</div>
		                	</div>  
		              	</div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="form-body">
		            	<div class="row">
		                	<div class="col-xs-4">
			                  	<label>Date Out</label> 
			                  		<div class="input-group date">
				                    	<div class="input-group-addon">
					                      	<i class="fa fa-calendar"></i>
					                   	</div>
					                    	<input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_out" value="<?= date('m/d/Y', strtotime($data->time_out)) ;?>">
				                  	</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Out</label>
		                  		<div class="input-group">
		                    		<input type="text" style="background-color: #e9ecef" class="form-control timepicker" name="time_out" value="<?= date('H:i', strtotime($data->time_out)) ;?>">
		                    		<div class="input-group-addon">
		                      		<i class="fa fa-clock-o"></i>
		                    		</div>
		                  		</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Passing</label>
		                  		<div class="input-group">
		                   			<input type="text" class="form-control timepicker" name="time_passing" value="<?= date('H', strtotime($data->time_passing)) ;?>">
		                    		<div class="input-group-addon">
		                      			<i class="fa fa-clock-o"></i>
		                   		 	</div>
		                  		</div>
		                	</div>   
		              	</div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="form-body">
		              	<div class="row">
		                	<div class="col-xs-12">
			                  	<label>Remark</label>
			                  	<textarea class="form-control" placeholder="Enter Remark Here" name="remark"><?= $data->remark;?></textarea>
		                	</div>
		              	</div>
		            </div>
		        </div>
			</div>
		    <!-- -----------------------------------------------For User ---------------------------------------------------------->
        <?php else:?>
        <input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
   			<div class="modal-body">
        		<div class="form-group">
		            <div class="form-body">
		              	<div class="row">
		                	<div class="col-xs-4">
		                  		<label>Date</label>
		                		<div class="input-group date">
		                  			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
		                  			<input type="text" class="form-control pull-right datepicker"  name="date" value="<?= date('m/d/Y', strtotime($data->date)) ;?>">
		                		</div>
		                	</div>
			                <div class="col-xs-4">
			                  	<label>Shift</label>
			                  	<select class="form-control" name="shift">
									<?php foreach ($shift as $value) {
										$selected = "";
										if($data->shift == $value['code']) $selected = " selected";
										echo '<option value="'.$value['code'].'"'.$selected.'>'.$value['name'].'</option>';
									}
									?>
								</select>
			                </div>  
			                <div class="col-xs-4">
		                  		<label>ID Unit</label> 
		                  		<input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>">
		                	</div>
			            </div>  
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="form-body">
		              	<div class="row">
			                <div class="col-xs-4">
			                  	<label>Posisi (M/K)</label> 
			                  	<select class="form-control" name="position" id="position">
									<?php foreach ($position as $value) {
										$selected = $data->position == $value['code'] ? ' selected' : '';
										echo'<option value="'.$value['code'].'"'.$selected.' >'.$value['name'].'</option>';
									}
									?>
								</select>
			                </div>
			                <div class="col-xs-4">
			                  	<label>Cargo Muatan</label> 
			                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
									<?php foreach ($cargo_muatan as $value) {
										$selected = $data->cargo == $value['name'] ? ' selected' : '';
										echo '<option value="'.$value['name'].'"'.$selected.'>'.$value['name'].'</option>';
									}
									?>
								</select>
			                </div>
			                <div class="col-xs-4">
			                  	<label>Code Standby</label> 
			                  	<select class="form-control" name="code_standby" id="code_standby">
									<?php foreach ($code_standby as $value) {
										$selected = $data->code_stby == $value['code'] ? ' selected' : '';
										echo '<option value="'.$value['code'].'"'.$selected.'>'.$value['code'].'</option>';
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
		                	<div class="col-xs-4">
		                  		<label>Date In</label> 
		                    	<div class="input-group date">
			                      	<div class="input-group-addon">
			                        	<i class="fa fa-calendar"></i>
			                      	</div>
			                      	<input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="<?= date('m/d/Y', strtotime($data->time_in)) ;?>">
		                    	</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time In</label>
		                    		<div class="input-group">
			                      		<input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in" value="<?= date('H:i', strtotime($data->time_in)) ;?>">
			                      		<div class="input-group-addon">
			                        		<i class="fa fa-clock-o"></i>
			                      		</div>
		                    		</div>
		                	</div>  
		              	</div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="form-body">
		            	<div class="row">
		                	<div class="col-xs-4">
			                  	<label>Date Out</label> 
			                  		<div class="input-group date">
				                    	<div class="input-group-addon">
					                      	<i class="fa fa-calendar"></i>
					                   	</div>
					                    	<input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_out" value="<?= date('m/d/Y', strtotime($data->time_out)) ;?>">
				                  	</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Out</label>
		                  		<div class="input-group">
		                    		<input type="text" style="background-color: #e9ecef" class="form-control timepicker" name="time_out" value="<?= date('H:i', strtotime($data->time_out)) ;?>">
		                    		<div class="input-group-addon">
		                      		<i class="fa fa-clock-o"></i>
		                    		</div>
		                  		</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Passing</label>
		                  		<div class="input-group">
		                   			<input type="text" class="form-control timepicker" name="time_passing" value="<?= date('H', strtotime($data->time_passing)) ;?>">
		                    		<div class="input-group-addon">
		                      			<i class="fa fa-clock-o"></i>
		                   		 	</div>
		                  		</div>
		                	</div>   
		              	</div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="form-body">
		              	<div class="row">
		                	<div class="col-xs-12">
			                  	<label>Remark</label>
			                  	<textarea class="form-control" placeholder="Enter Remark Here" name="remark"><?= $data->remark;?></textarea>
		                	</div>
		              	</div>
		            </div>
		        </div>
			</div>
		<?php endif;?>

			<script type="text/javascript">
				$('.datepicker').datepicker({
				      autoclose: true
				    })
			</script>

	<?php 

	}


	public function rom($id)
	{
		# code...
	}

	public function csa_in($id)
	{
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
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
		            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>">
              </div>
              <div class="col-xs-4">
                <label>Cargo Muatan</label> 
                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
						<?php foreach ($cargo_muatan as $value) {
							$selected = $data->cargo == $value['name'] ? ' selected' : '';
							echo '<option value="'.$value['name'].'"'.$selected.'>'.$value['name'].'</option>';
						}
						?>
					</select>                
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

	public function csa_in_muatan($id)
	{
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
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
		            <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>">
              </div>
              <div class="col-xs-4">
                <label>Cargo Muatan</label> 
                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
						<?php foreach ($cargo_muatan as $value) {
							$selected = $data->cargo == $value['name'] ? ' selected' : '';
							echo '<option value="'.$value['name'].'"'.$selected.'>'.$value['name'].'</option>';
						}
						?>
					</select>                
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

	public function shift_operations_scale($id)
	{
		$level			= $this->session->userdata('level');
		$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		$area			= $this->Crud->search('table_enum', array('type' => 'area'))->result_array();
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
		$rom	= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();

		$this->load->model('Shift_operations', 'operation');

		$data = $this->operation->detail_shift_operations($id)->result();
		$data = $data[0];
		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
            	<div class="row">
              		<div class="col-xs-6">
              			<label>Datetime</label>
            			<div class="input-group date">
                  			<div class="input-group-addon">
                    			<i class="fa fa-calendar"></i>
                  			</div>
                  		<input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="<?= date('m/d/Y', strtotime($data->time_in)) ;?>">
            			</div>
              		</div>
            		<div class="col-xs-6">
                		<label>ID Unit</label> 
		            	<input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>">
              		</div>
            	</div>
            </div>              
          </div>
          <div class="form-group">
          	<div class="form-body">
          		<div class="row">
	              	<div class="col-xs-6">
	                <label>Cargo Muatan</label> 
	                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
							<?php foreach ($cargo_muatan as $value) {
								$selected = $data->cargo == $value['name'] ? ' selected' : '';
								echo '<option value="'.$value['name'].'"'.$selected.'>'.$value['name'].'</option>';
							}
							?>
						</select>                
	              	</div>
          			<div class="col-xs-6">
	                	<label>Rom</label> 
		              	<select class="form-control" name="code_standby" id="code_standby">
							<?php foreach ($rom as $value) {
								$selected = $data->rom == $value['id'] ? ' selected' : '';
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
}