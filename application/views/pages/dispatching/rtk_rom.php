<script src="<?php echo base_url('___/bower_components/chart.js/Chart.min.js');?>"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        RTK ROM
        <small><?=get_enum($this->session->userdata('area'))?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">RTK ROM <?=get_enum($this->session->userdata('area'))?></li>
      </ol></br>
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label>Shift :</label>
            <select class="form-control" name="shift" id="shift_code">
              <?php foreach ($shift_code as $key) {
                  $select = $key['code'] == $shift ? ' selected': '';
                    echo '<option value="'.$key['code'].'"'.$select.'>'.$key['code'].' </option>';
              }?>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
           <label>Time : </label>
            <select class="form-control" name="time" id="time">
              <?php
                for ($a=$jam, $i = 0; $i < 12; $i++, $a++) { 
                  if ($a >= 24) {
                    $a = $a - 24;
                  }
                  $b = $a . ':00';
                  $select = $a == $hour ? ' selected': '';
                  echo  '<option value="' . $a . '"'.$select.'>' . $b. '</option>';                  
                }
              ?>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Date :</label>
            <div class="input-group date">
              <div class="input-group-addon" style="background-color: #e9ecef"> <i class="fa fa-calendar"></i></div>
                <input  type="text" name="date" class="form-control datepicker" value=" <?= date('m/d/Y', strtotime($date));?>">
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
                  <?php
                    foreach ($table as $value) {
                      echo '<th colspan="3">'.$value['rom_spp'].'</th>
                            </tr>';
                      echo '<tr>
                              <th>Plan</th>
                              <th>Act.K</th>
                              <th>Act.M</th>
                            </tr>';
                    }
                  ?>
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