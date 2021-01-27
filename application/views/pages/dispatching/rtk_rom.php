<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>RTK ROM<small><?=get_enum($this->session->userdata('area'))?></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">RTK ROM <?=get_enum($this->session->userdata('area'))?></li>
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
                <thead>
                  <tr>
                    <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #bdc3c7;">Time</th>
                    <?php foreach ($table as $value) :?>
                      <th colspan="3"  style="background-color: #74b9ff; text-align: center; vertical-align: middle;"><?=$value['rom_spp'];?></th>
                    <?php endforeach;?>
                    <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #bdc3c7;">A.Kos</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #bdc3c7;">A.Mua</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #bdc3c7;">PLAN</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #bdc3c7;">Prosentase</th>
                  </tr>
                  <tr>
                    <?php 
                    $kosongan = array();
                    $sum_total['a_kos_'] = array();
                    $sum_total['a_mua_'] = array();
                    $sum_total['total_plan_'] = array();
                    foreach ($table as $value) :
                      $kosongan[$value['rom_id']] = $this->ach_romatk->achievement_rom_rtk($value['rom_id'])->row_array();

                      $sum_total['plan_'.$value['rom_id']] = array();
                      $sum_total['actual_kosongan_'.$value['rom_id']] = array();
                      $sum_total['actual_muatan_'.$value['rom_id']] = array();
                      ?>
                      <th style="background-color: #74b9ff;">Plan</th>
                      <th style="background-color: #74b9ff;">Act.K</th>
                      <th style="background-color: #74b9ff;">Act.M</th>                    
                    <?php endforeach;?>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 0;
                  for ($a=($jam),$i=1; $i <= $limit; $i++, $a++) :
                    if ($a >= 24) {
                      $a = $a - 24;
                    }


                    $b = $a + 1;
                    if ($b > 24) {
                      $b = ($b - 24);
                    }

                    $x = $a < 10 ? '0'.$a.'' : $a.'';
                    $y = $b < 10 ? '0'.$b.'' : $b.'';

                    $c = $x.  ' : '  .$y;

                    echo '<tr>';
                    echo '<th nowrap>' . $c . '</th>';
                    $a_kos = array();
                    $a_mua = array();
                    $a_plan = array();
                    foreach ($table as $value) :
                      $val = !empty(@$callback_kosongan['kosongan_'.$i]) ? @$callback_kosongan['kosongan_'.$i] : 0;

                      array_push($a_kos, @$val );
                      array_push($a_mua, @$value['actual_'.$i] );
                      array_push($a_plan, @$value['jam_'.$i] );
                      // print_r($value['jam_'.$i] );
                      $callback_kosongan = $kosongan[$value['rom_id']];
                      echo '<td style="text-align: center; vertical-align: middle; background-color: #ffffff">' . $value['jam_'.$i] . '</td>';
                      // echo '<td>' . '</td>';
                      echo '<td style="text-align: center; vertical-align: middle; background-color: #ffffff">' . @$val . '</td>';
                      echo '<td style="text-align: center; vertical-align: middle; background-color: #ffffff">' . $value['actual_'.$i] . '</td>';


                      array_push($sum_total['plan_' . $value['rom_id']], $value['jam_'.$i]);
                      array_push($sum_total['actual_kosongan_' . $value['rom_id']], @$val );
                      array_push($sum_total['actual_muatan_' . $value['rom_id']], $value['actual_'.$i] );
                    endforeach;
                    $presentase = 0;
                    if (array_sum($a_mua) != 0 || array_sum($a_plan) != 0 ) {
                      $presentase = number_format(array_sum($a_mua)/array_sum($a_plan)*100, 1);
                    }
                    // $callback_kosongan = $kosongan[$value['rom_id']];
                    // $val = !empty(@$callback_kosongan['kosongan_'.$i]) ? @$callback_kosongan['kosongan_'.$i] : 0;
                    echo '<td style="text-align:center;">'.array_sum($a_kos).'</td>';
                    echo '<td style="text-align:center;">'.array_sum($a_mua).'</td>';
                    echo '<td style="text-align:center;">'.array_sum($a_plan).'</td>';
                    echo '<td style="text-align:center;">'.$presentase.'%</td>';



                    array_push($sum_total['a_kos_'], array_sum($a_kos) );
                    array_push($sum_total['a_mua_'], array_sum($a_mua) );
                    array_push($sum_total['total_plan_'], array_sum($a_plan) );
                    echo '<tr>';
                  endfor;
                  echo '<tr>
                  <th style="text-align:center;">Total</th>';
                  foreach ($table as $value) :
                    echo '<th style="text-align:center;">' .array_sum($sum_total['plan_'.$value['rom_id']]). '</th>';
                    echo '<th style="text-align:center;">' .array_sum($sum_total['actual_kosongan_'.$value['rom_id']]). '</th>';
                    echo '<th style="text-align:center;">' .array_sum($sum_total['actual_muatan_'.$value['rom_id']]). '</th>';
                  endforeach;
                  $presentase = 0;
                  if (array_sum($sum_total['a_mua_']) != 0 || array_sum($sum_total['total_plan_']) != 0 ) {
                    $presentase = number_format(array_sum($sum_total['a_mua_'])/array_sum($sum_total['total_plan_'])*100, 1);
                  }

                  echo '<td style="text-align:center;">' .array_sum($sum_total['a_kos_']). '</td>';
                  echo '<td style="text-align:center;">' .array_sum($sum_total['a_mua_']). '</td>';
                  echo '<td style="text-align:center;">' .array_sum($sum_total['total_plan_']). '</td>';
                  echo '<td style="text-align:center;">'.$presentase.'%</td>';
                  echo '</tr>';  
                  // endforeach;    
                  ?>
                </tbody>
              </table>

            </div>
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