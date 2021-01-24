<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>Achievement SeamSeries<small><?=get_enum($this->session->userdata('area'))?></small></h1></br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Achievement SeamSeries <?=get_enum($this->session->userdata('area'))?></li>
      </ol>
      <form method="GET">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label>Date :</label>
              <div class="input-group date">
                <div class="input-group-addon" style="background-color: #e9ecef"> <i class="fa fa-calendar"></i></div>
                <input  type="date" name="date" class="form-control" style="padding: 0;" value="<?= date('Y-m-d', strtotime($date));?>">
              </div>
            </div>
          </div>
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
          <div class="col-md-4">
            <div class="form-group">
              <label>&nbsp;</label></br>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
              <a href="<?php echo base_url("Exports/achievement_seam_series");?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</a>
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
                  <?php foreach ($table as $value): $color = explode(',', $value['color']);?>
                  <tr nowrap style="text-align: center; vertical-align: middle;">
                    <td nowrap style="background-color: <?= $color['0'];?> ;color: <?= @$color['1'];?> " ><?= $value['material'];?></td>
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
  </section>
</div>

<script type="text/javascript">
  $('.datepicker').datepicker({
    autoclose: true
  });

  $(document).on('change', '#shift_code', function(e){
    $('#time').html('');
    var shift = $(this).val();
      if (shift == 1) {
        var jam = 4;
      //   $('#time').html('<option value="4">4:00</option><option value="5">5:00</option><option value="6">6:00</option><option value="7">7:00</option><option value="8">8:00</option><option value="9">9:00</option><option value="10">10:00</option><option value="11">11:00</option><option value="12">12:00</option><option value="13">13:00</option><option value="14">14:00</option><option value="15">15:00</option> ');
      }else{
        var jam = 16;
      //   $('#time').html('<option value="16">16:00</option><option value="17">17:00</option><option value="18">18:00</option><option value="19">19:00</option><option value="20">20:00</option><option value="21">21:00</option><option value="22">22:00</option><option value="23">23:00</option><option value="0">0:00</option><option value="1">1:00</option><option value="2">2:00</option><option value="3">3:00</option>');
      }
      var text = "";
        var a;
        var i;
        var b;
        for (a = jam, i = 0 ; i < 12; i++, a++) {
          if (a >= 24) {
            a = a - 24;
          }
          b = a + ':00';
          text += '<option value="' + a + '">' + b + '</option>';
        }
        $('#time').html(text);
  });
</script>