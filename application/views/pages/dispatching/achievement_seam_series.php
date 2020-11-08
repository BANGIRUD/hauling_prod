<script src="<?php echo base_url('___/bower_components/chart.js/Chart.min.js');?>"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <form method="GET"> -->
      <h1>
        Achievement SeamSeries
        <small><?=get_enum($this->session->userdata('area'))?></small>
      </h1><br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Achievement SeamSeries <?=get_enum($this->session->userdata('area'))?></li>
      </ol>

      <form>
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
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
            <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
        </div>
      </div>
      </form>
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
                  <?php foreach ($table as $value): ?>
                    <tr nowrap style="text-align: center; vertical-align: middle;">
                      <td nowrap><?= $value['material'];?></td>
                      <td nowrap><?= $value['rom_spp'];?></td>

                      <?php
                          $jam = 4;
                          if ($shift == 2) {
                            $jam = 16;

                          }
                          $plan = 0;
                          $actual = 0;
                          $start_jam = $jam;
                          $start_i = $jam;
                          for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
                            echo '<td> ' .$value['jam_'.$i]. ' </td>';
                            echo '<td> ' .$value['actual_'.$i]. ' </td>';

                            $total[$i][] = $value['jam_'.$i];
                            $total_act[$i][] = $value['actual_'.$i];

                            $plan = $plan+$value['jam_'.$i];
                            $actual = $actual+$value['actual_'.$i];
                            if ($a == $hour) {
                              $start_jam = $a;
                              $start_i = $i;
                              break;
                            }
                          }

                          for ($a=$start_jam+1, $i = $start_i+1; $i <= 12; $i++, $a++) { 
                            $total[$i][] = 0;
                            $total_act[$i][] = 0;
                            echo '<td>0</td>';
                            echo '<td>0</td>';

                            $plan = $plan+0;
                            $actual = $actual+0;
                          }
                        ?>
                        <td nowrap><?= $plan;?></td>
                        <td nowrap><?= $actual;?></td>
                        <td nowrap><?php
                        $ach = $plan != 0 || $actual != 0 ? $actual/$plan*100 : 0;

                        echo number_format($ach, 1);?>%</td>
                    </tr>
                    <?php endforeach;
                  ?>
                    <tr nowrap style="text-align: center; vertical-align: middle; background-color: #74b9ff; font-weight: bolder;">
                      <td colspan="2">Total</td>
                      <?php
                        $total_plan = array();
                        $total_actual = array();
                        for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 

                            $total_plan[] = @array_sum($total[$i]);
                            $total_actual[] = @array_sum($total_act[$i]);
                            echo '<td>'.@array_sum($total[$i]).'</td>';
                            echo '<td>'.@array_sum($total_act[$i]).' </td>';
                          }
                      ?>
                      <td nowrap><?=@array_sum($total_plan);?></td>
                      <td nowrap><?= @array_sum($total_actual);?></td>
                      <td nowrap><?php
                        $ach = @array_sum($total_plan) != 0 || @array_sum($total_actual) != 0 ? @array_sum($total_actual)/@array_sum($total_plan)*100 : 0;

                        echo number_format($ach, 1);?>%</td>
                    </tr>
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