<script src="<?php echo base_url('___/bower_components/chart.js/Chart.min.js');?>"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Achievement SeamSeries
        <small><?=get_enum($this->session->userdata('area'))?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Achievement SeamSeries <?=get_enum($this->session->userdata('area'))?></li>
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
            <select class="form-control" name="time" id="time">
              <?php
                for ($a=$jam, $i = 0; $i < 24; $i++, $a++) { 
                  if ($a >= 24) {
                    $a = $a - 24;
                  }
                    $b = $a . ':00';
                  echo  '<option value="' . $a . '">' . $b. '</option>';
                  
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
              <h3 style="text-align: center">ACHIEVEMENT SEAM SERIES SHIFT <?=$shift?></h3>
              <h4 style="text-align: center" id="date-update"></h4>
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
                      <th rowspan="2" nowrap style="text-align: center; vertical-align: middle;">Raw Material</th>
                      <th rowspan="2" nowrap style="text-align: center; vertical-align: middle;">ROM</th>

                      <?php
                          $jam = 4;
                          if ($shift == 2) {
                            $jam = 16;

                          }
                          for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
                            if ($a >= 24) {
                              $a = $a - 24;
                            }
                            if ($a == 7) {
                              $b = $a . ':00';
                            }else{
                              $b = $a . ':00';
                            }
                            echo '<th colspan="2" width="120" style="text-align: center;"> ' .$b. ' </th>' ; 
                        }?> 
                        <th colspan="2" nowrap style="text-align: center; vertical-align: middle;">Total</th>
                        <th rowspan="2" nowrap style="text-align: center; vertical-align: middle;">ACHIEV.</th>
                    </tr>
                    <tr>
                    <?php for ($a=$jam, $i = 1; $i <= 12; $i++, $a++):?>
                      <th width="500" style="text-align: center;">Plan</th>
                      <th nowrap style="text-align: center;">Actual</th>
                    <?php endfor;?>
                      <th width="500" style="text-align: center;">Plan</th>
                      <th nowrap style="text-align: center;">Actual</th>                    
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