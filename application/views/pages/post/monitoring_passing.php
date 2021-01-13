<div class="content-wrapper"><!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h1>Monitoring Passing <?=$by_area_name?><small></small></h1>
    		<ol class="breadcrumb">
      			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      			<li class="active">Monitoring Passing <?=$by_area_name?></li>
    		</ol></br>
    	<div class="row">
    		<div class="col-md-2">
    			<div class="form-group">
    				<label>Area :</label>
    				<select class="form-control" name="pos" id="area">

                    	<?php 
                    	if ($pos->num_rows() > 1) {
                    		echo '<option value="">ALL</option>';
                    	}
                    	
                    	foreach ($pos->result_array() as $key) {
                    		$selected = $key['id'] == $by_area_id ? ' selected':'';
                      		echo '<option value="'.$key['id'].'"'.$selected.'>'.$key['name'].' </option>';
                    	}?>
                  </select>
    			</div>
    		</div>
    		<div class="col-md-2">
    			<div class="form-group">
    				<label>Date :</label>
					<div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input  type="text" name="date" id="date" class="form-control datepicker" value=" <?= date('m/d/Y');?>">
                    </div>
    			</div>
    		</div>
    		<div class="col-md-2">
    			<div class="form-group">
    				<label>Shift :</label>
					<select class="form-control" name="shift_code" id="shift_code">
                    <?php foreach ($shift_code as $key) {
                      echo '<option value="'.$key['code'].'">'.$key['code'].' </option>';
                    }?>
                  </select>
    			</div>
    		</div>
    		<div class="col-md-4">
    			<div class="form-group">
    				<label>&nbsp;</label></br>
    				<button type="button" id="filter" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
    				<a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</a>
    			</div>
    		</div>
    	</div>
  	</section>
  	<section class="content"><!-- Main content -->
  		<div class="row">
  			
		<?php
			$jam = 6;
			if ($shift == 2) {
				$jam = 18;

			}
			for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
				if ($a >= 24) {
					$a = $a - 24;
				}
				$b = $a + 1;
				if ($b > 23) {
					$b = ($b - 24);
				}
				if ($a == 7) {
					$c = $a . ':00 - ' . ($b) . ':00';
				}else{
					$c = $a . ':00 - ' . ($b) . ':00';
				}
				$data = $this->monitoring->monitoring_muatan($a, $by_area_id)->result_array();
			?>
  			<div class="col-md-3">
        		<div class="box">
      				<div class="box-body">
			            <div class="table-responsive">
			              	<table class="table table-bordered table-striped" id="populasi">
			                	<thead class="text-center border" style="background-color: #3742fa; color: #ffffff">
			                		<tr colspan="2" > 
										<th colspan="4" style="text-align: center"><?= $c;?></th>
								  	</tr>
								  	<tr>
			                			<th style="text-align: center">No</th>
			                			<th style="text-align: center">Time</th>
			                			<th style="text-align: center">C/N</th>
			                			<th style="text-align: center">Raw Material</th>
						          	</tr>
			                	</thead>
				                <tbody>
				                	<?php 
				                	$no = 0;
				                	foreach ($data as $value) {
				                		$no++;
				                		$color = explode(',', $value['color']);
				                		echo '<tr>
					                		<td style="text-align: center; background-color: #f1f2f6">'.$no.'</td>
					                		<td style="text-align: center; background-color: #f1f2f6">'.date('H:i', strtotime($value['time_out'])).'</td>
					                		<td style="text-align: center; background-color: #f1f2f6">'.$value['cn_unit'].'</td>
					                		<td style="text-align: center; background-color:'. $color[0] . ';color:'.@$color[1].'">'.$value['cargo'].'</td>
					                	</tr>';
				                	}
				                	?>

				                	<tr>
				                		<td colspan="2" style="text-align: center; font-weight: bolder; background-color: #a4b0be">Total</td>
				                		<td style="text-align: center; font-weight: bolder; background-color: #a4b0be"><?=$no?></td>
				                		<td style="text-align: center; font-weight: bolder; background-color: #a4b0be" >Unit</td>
				                	</tr>
				                	
				                </tbody>
			                </table>
			            </div>
			        </div>
				</div>
			</div>
		<?php 
		// if ($i > 4) {
			if ($i%4==0) {
				echo '</div><div class="row">';
			}

		// }
	} ?>
		</div> 
  	</section>
</div>

<script type="text/javascript">
	$('.datepicker').datepicker({
		autoclose: true
	});


	$(document).on("click", "#filter", function(e) {
		e.preventDefault();
		var area = $("#area").val();
		window.location = "<?= base_url('dash/monitoring_passing/');?>" + area;
	})
</script>