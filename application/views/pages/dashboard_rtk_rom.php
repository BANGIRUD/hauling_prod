<script src="<?php echo base_url('___/bower_components/chart.js/Chart.min.js');?>"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>RTK ROM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">RTK ROM</li>
      </ol></br>
      <div class="row">
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
        <div class="col-md-2">
          <div class="form-group">
            <label>Time :</label>
            <select class="form-control" name="pos" id="pos">
              <option>15:00</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Date :</label>
          <div class="input-group date">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <input  type="text" name="date" class="form-control datepicker" value=" <?= date('m/d/Y');?>">
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>&nbsp;</label></br>
            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
            <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="text-align: center">RTK PER ROM SHIFT <?=$shift?></h3>
              <h4 style="text-align: center" value=""><?= date('d F Y');?></h4>
            </div>
          </div>
        </div>
        <div class="col-md-12">
        <div class="box ">
          <div class="box-body">  
            <div class="table-responsive">
              <table class="table table-bordered table-striped passing" id="" >
                <thead style="background-color: #74b9ff;">
                  <tr>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Time</th>
                    <?php foreach ($rom as $value) {
                      echo '<th colspan="3" style="text-align: center;">'.$value ['name'].'</th>';
                    }
                    ?>
                    
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Actual.Kos</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Actual.Mua</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">PLAN</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Porsentase</th>
                  </tr>
                  <tr>
                    <?php
                    for ($i=0; $i <13 ; $i++) { 
                     echo '<th style="text-align: center;">Plan</th>';
                     echo '<th style="text-align: center;">Actual.Kos</th> ';
                     echo '<th style="text-align: center;">Actual.Mua</th>';
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

            </div>
          </div>
        </div>
        </div>
        <div class="col-md-12">
          <div id="container" >
            <canvas id="canvas"></canvas>
          </div>
  
        </div>

    </section>


  </div>

  <script type="text/javascript">
  $('.datepicker').datepicker({
    autoclose: true
  });
</script>