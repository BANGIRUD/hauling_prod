<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function shift_operations($id = 1)
	{
		$this->load->model('Dispatching', 'record_prod');

		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$rom			= $this->Crud->search('table_enum', array('type' => 'rom'))->result_array();
		$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		$data 			= $this->record_prod->edit_record_production($id)->result();
		$data 			= $data[0];
		// print_r($data);
		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body">
          	<div class="form-group">
            	<div class="form-body">
            		<div class="row">
	              		<div class="col-xs-4">
	              			<label>Date</label>
	              			<div class="input-group date">
			                	<div class="input-group-addon" style="background-color: #e9ecef"> <i class="fa fa-calendar"></i>
			                	</div>
	              				<input class="form-control" type="date" style="padding: 0;"name="date" placeholder="Enter Datetime Here" id="date" value="<?= $data->date ;?>">
			             	</div>
	              		</div>
	              		<div class="col-xs-4">
	              			<label>Time</label>
	              			<div class="input-group">
			                    <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="time"  name="time" value="<?= date('H:i', strtotime($data->time)) ;?>">
			                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
		                    </div>
	              		</div>
	              		<div class="col-xs-4">
	              			<label>Shift</label>
	              			<select class="form-control" name="shift" id="shift" style="background-color: #e9ecef">
								<?php foreach ($shift as $value) {
									$selected = "";
										if($data->shift == $value['id']) $selected = " selected";
										echo '<option value="'.$value['code'].'"'.$selected.'>'.$value['code'].'</option>';
								}?>
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
		            		<input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit" value="<?= $data->cn_unit ;?>" readonly>
              			</div>
	              		<div class="col-xs-4">
		                	<label>Cargo Muatan</label> 
		                  	<select class="form-control" name="cargo_muatan" id="cargo_muatan">
								<?php foreach ($cargo_muatan as $value) {
									$selected = $data->cargo == $value['name'] ? ' selected' : '';
									echo '<option value="'.$value['name'].'"'.$selected.'>'.$value['name'].'</option>';
								}?>
							</select>                
	              		</div>
          				<div class="col-xs-4">
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

	public function monitoring_operations_34_muatan($id = 1)
	{
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();

		$this->load->model('Post', 'operations');
		
		$data = $this->operations->data_shift_operation_to_monitoring_34($id)->result();
		$data = $data[0];
		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
            	<div class="row">
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
								echo '<option'.$selected.' value="'.$value['code'].'">'.$value['code'] .' | '. $value['name'].'</option>';
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
                  <textarea name="remark" id="remark" class="form-control" placeholder="Enter Remark Here ..."><?= $data->remark ;?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
	}

	public function monitoring_operations_34_standby($id)
	{
		$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
		$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();
		


		$this->load->model('Post', 'operations');
		
		$data = $this->operations->data_monitoring_operations_34_standby($id)->result();
		$data = $data[0];
		print_r($data);

		$timepassing = $data->time_passing == NULL ? '' : date('H',strtotime($data->time_passing));
		if (strtolower($data->code_stby) == 'l') {
             $timeout = date('H:i',strtotime($data->time_out));
             $dateout = date('Y-m-d',strtotime($data->time_out));
        } else {
            $timeout = $data->time_out == NULL ? '' : date('H:i',strtotime($data->time_out));
            $dateout = $data->time_out == NULL ? '' : date('Y-m-d',strtotime($data->time_out));
        }

		?>
		
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
   			<div class="modal-body">
        		<div class="form-group">
		            <div class="form-body">
		              	<div class="row">
		                	<div class="col-xs-4">
		                  		<label>Date</label>
		                		<div class="input-group date">
		                  			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
		                  			<input type="date" style="background-color: #e9ecef; padding: 0;" class="form-control pull-right datepicker"  name="date" value="<?= date('Y-m-d', strtotime($data->date)) ;?>">
		                		</div>
		                	</div>
			                <div class="col-xs-4">
			                  	<label>Shift</label>
			                  	<select class="form-control" name="shift">
									<?php foreach ($shift as $value) {
										$selected = "";
										if($data->shift == $value['code']) $selected = " selected";
										echo '<option value="'.$value['code'].'"'.$selected.'>'.$value['code'].'</option>';
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
			                      	<input type="date" style="background-color: #e9ecef; padding: 0;" class="form-control pull-right datepicker" name="date_in" value="<?= date('Y-m-d', strtotime($data->time_in)) ;?>">
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
					                    	<input type="date" style="background-color: #e9ecef; padding: 0;" class="form-control pull-right datepicker" name="date_out" value="<?= $dateout ;?>">
				                  	</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Out</label>
		                  		<div class="input-group">
		                    		<input type="text" style="background-color: #e9ecef" class="form-control timepicker" name="time_out" value="<?= $timeout ;?>">
		                    		<div class="input-group-addon">
		                      		<i class="fa fa-clock-o"></i>
		                    		</div>
		                  		</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Passing</label>
		                  		<div class="input-group">
		                   			<input type="text" class="form-control timepicker" name="time_passing" value="<?=$timepassing;?>">
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
        <?php
	}

	public function monitoring_operations_65_muatan($id = 1)
	{
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();

		$this->load->model('Post', 'operations');
		
		$data = $this->operations->data_shift_operation_to_monitoring_65($id)->result();
		$data = $data[0];
		?>
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
		<div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
            	<div class="row">
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
								echo '<option'.$selected.' value="'.$value['code'].'">'.$value['code'] .' | '. $value['name'].'</option>';
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
                  <textarea name="remark" id="remark" class="form-control" placeholder="Enter Remark Here ..."><?= $data->remark ;?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
	}

	public function monitoring_operations_65_standby($id)
	{
		$shift			= $this->Crud->search('table_enum', array('type' => 'shift'))->result_array();
		$cargo_muatan	= $this->Crud->search('table_enum', array('type' => 'cargo_muatan'))->result_array();
		$code_standby	= $this->Crud->search('table_enum', array('type' => 'code_standby'))->result_array();
		$position		= $this->db->from('table_enum')->where('type', 'position')->order_by('name', 'desc')->get()->result_array();
		


		$this->load->model('Post', 'operations');
		
		$data = $this->operations->data_monitoring_operations_65_standby($id)->result();
		$data = $data[0];
		print_r($data);

		$timepassing = $data->time_passing == NULL ? '' : date('H',strtotime($data->time_passing));
		if (strtolower($data->code_stby) == 'l') {
             $timeout = date('H:i',strtotime($data->time_out));
             $dateout = date('Y-m-d',strtotime($data->time_out));
        } else {
            $timeout = $data->time_out == NULL ? '' : date('H:i',strtotime($data->time_out));
            $dateout = $data->time_out == NULL ? '' : date('Y-m-d',strtotime($data->time_out));
        }

		?>
		
		<input type="hidden" class="form-control pull-right" name="id" value="<?=$data->id ;?>">
   			<div class="modal-body">
        		<div class="form-group">
		            <div class="form-body">
		              	<div class="row">
		                	<div class="col-xs-4">
		                  		<label>Date</label>
		                		<div class="input-group date">
		                  			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
		                  			<input type="date" style="background-color: #e9ecef; padding: 0;" class="form-control pull-right datepicker"  name="date" value="<?= date('Y-m-d', strtotime($data->date)) ;?>">
		                		</div>
		                	</div>
			                <div class="col-xs-4">
			                  	<label>Shift</label>
			                  	<select class="form-control" name="shift">
									<?php foreach ($shift as $value) {
										$selected = "";
										if($data->shift == $value['code']) $selected = " selected";
										echo '<option value="'.$value['code'].'"'.$selected.'>'.$value['code'].'</option>';
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
			                      	<input type="date" style="background-color: #e9ecef; padding: 0;" class="form-control pull-right datepicker" name="date_in" value="<?= date('Y-m-d', strtotime($data->time_in)) ;?>">
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
					                    	<input type="date" style="background-color: #e9ecef; padding: 0;" class="form-control pull-right datepicker" name="date_out" value="<?= $dateout ;?>">
				                  	</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Out</label>
		                  		<div class="input-group">
		                    		<input type="text" style="background-color: #e9ecef" class="form-control timepicker" name="time_out" value="<?= $timeout ;?>">
		                    		<div class="input-group-addon">
		                      		<i class="fa fa-clock-o"></i>
		                    		</div>
		                  		</div>
		                	</div>
		                	<div class="col-xs-4">
		                  		<label>Time Passing</label>
		                  		<div class="input-group">
		                   			<input type="text" class="form-control timepicker" name="time_passing" value="<?=$timepassing;?>">
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
        <?php
	}

}