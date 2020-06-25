<div class="content-wrapper"><!-- Content Header (Page header) -->
  	<section class="content-header">
    	<h1>Monitoring Unit Muatan<small></small></h1>
    		<ol class="breadcrumb">
      			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      			<li class="active">Monitoring Unit Muatan</li>
    		</ol>
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
				$data = $this->monitoring->monitoring_muatan($a)->result_array();
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
				                		echo '<tr>
					                		<td style="text-align: center; background-color: #f1f2f6">'.$no.'</td>
					                		<td style="text-align: center; background-color: #f1f2f6">'.date('H:i', strtotime($value['time_out'])).'</td>
					                		<td style="text-align: center; background-color: #f1f2f6">'.$value['cn_unit'].'</td>
					                		<td style="text-align: center; background-color: #f1f2f6">'.$value['cargo'].'</td>
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