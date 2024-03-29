<?php
  $by_area   = $this->session->userdata('area');

  $cargo_per_rom = array();
  $actual_cargo_per_rom = array();
  foreach ($table_rom->result_array() as $key) {
    $cargo_per_rom['rom_' . $key['rom']] = $this->spp->monitoring_data_rom_dispatch($date, $shift, $key['rom'])->result_array();
    // $actual_cargo_per_rom['rom_' . $key['rom']] = $this->shift_ops->monitoring_data_rom($date, $shift, $key['rom_id'])->result_array();
  }
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Monitoring Data
      <small><?=get_enum($by_area)?> Shift <?= $shift;?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Monitoring Data <?=get_enum($by_area)?></li>
    </ol></br>
    <!-- <div class="row">
      <div class="col-md-2">        
          <div class="form-group">
            <label>Rom Filter :</label>
            <select class="form-control" name="shift_code" id="shift_code">
              <?php foreach ($rom as $key) {
                echo '<option value="'.$key['code'].'">'.$key['name'].' </option>';
              }?>
            </select>
          </div>
      </div>
      <div class="col-md-2">        
          <div class="form-group">
            <label>Shift Filter :</label>
            <select class="form-control" name="shift_code" id="shift_code">
              <?php foreach ($shift_code as $key) {
                echo '<option value="'.$key['code'].'">'.$key['code'].' </option>';
              }?>
            </select>
          </div>
      </div>
    </div> -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
          $jam = 4;
          if ($shift == 2) {
            $jam = 16;
          }
          for ($h_jam=($jam+2), $a=$jam, $i = 1; $i <= 12; $i++, $a++, $h_jam++) :
            
            $a = $a >= 24 ? $a - 24 : $a;

            $b = $a+1;
            $b = $b >= 24 ? $b-24 : $b;

            $a_jam = $a < 10 ? '0'.$a.':00' : $a.':00';
            $b_jam = $b < 10 ? '0'.$b.':00' : $b.':00';
        ?> 
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="populasi">
                    <thead class="text-center border">
                      <tr>
                        <th style="background-color: blue; color: white;" colspan="3"><?= $a_jam . '-' . $b_jam;?></th>
                      </tr>
                      <tr>
                        <?php foreach ($table_rom->result_array() as $key) {
                          echo '<th style="background-color: blue; color: #ffffff; text-align:center;" colspan="5">'.$key['rom_spp'].'</th>';
                          echo '<th  style="background-color: white; color: white;" width="5">&nbsp;</th>';
                        }
                        ?>
                      </tr>
                      <tr>
                        <?php foreach ($table_rom->result_array() as $key) {
                          echo '<th style="background-color: blue; color: #ffffff; text-align:center;">Time</th>
                            <th nowrap style="background-color: blue; color: #ffffff; text-align:center;">Truck No</th>
                            <th style="background-color: blue; color: #ffffff; text-align:center;">Material</th>
                            <th style="background-color: blue; color: #ffffff; text-align:center;">Area</th>
                            <th style="background-color: blue; color: #ffffff; text-align:center;">Status</th>';
                          echo '<th>&nbsp;</th>';
                          // $dd = $shift_ops->report_rom_monitoring_shift_operations($key['id']);
                          // if ($dd->num_rows() > 0) {
                          //   foreach ($dd->result_array() as $value) {
                          //     echo $value['id'];
                          //   }
                          // }
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php foreach ($table_rom->result_array() as $key) {
                          $data_rom = $this->shift_ops->monitoring_operation_rom_data($date, $a, $key['rom_id'])->result_array();
                          

                          echo '<td style = "text-align:center; padding: 0;">';
                          foreach ($data_rom as $value) {
                            echo '<div style="padding: 8px">'.date('H:i', strtotime($value['time'])).'</div>';
                          }
                          echo '</td>';
                          echo '<td style="text-align:center; padding: 0;">';
                          foreach ($data_rom as $value) {
                            echo '<div style="padding: 8px">'.$value['cn_unit'].'</div>';
                          }
                          echo '</td>';
                          echo '<td nowrap style="padding: 0;">';
                          foreach ($data_rom as $value) {
                            $color = explode(',', $value['color']);
                            echo '<div style="background-color:'. $color[0] . ';color:'.@$color[1].';padding: 8px" >'.$value['cargo'].'</div>';
                          }
                          echo '</td>';
                          echo '<td nowrap style="padding: 0;">';
                          foreach ($data_rom as $value) {
                            echo '<div style="padding: 8px">'.$value['csa'].'</div>';
                          }
                          echo '</td>';
                          echo '<td style="padding: 0;">';
                          foreach ($data_rom as $value) {
                            if ($value['register'] == '') {
                              echo '<div style = "padding:8px;">&nbsp;</div>';
                            }else{
                              echo '<div style="background-color:'. colors_setting_unit(strtolower($value['register']))['bg'] . ';color:'.colors_setting_unit(strtolower($value['register']))['color'].';padding: 8px;text-align:center;">'.$value['register'].'</div>';
                            }
                          }
                          echo '</td>';
                          echo '<td style="background-color:white;">';
                          foreach ($data_rom as $value) {
                            echo '&nbsp;';
                          }
                          echo '</td>';
                        }
                        ?>

                      </tr>

                      <tr style="background-color: grey; color: white; text-align: center;">
                        <?php foreach ($table_rom->result_array() as $key) {
                          echo '<th>Cargo</th><th>Plan</th><th>Actual</th><td></td><th>Kurang</th><td style="background-color: white; color: white;">&nbsp;</td>';
                        }
                        ?>
                      </tr>
                      <tr>
                        <?php 
                        $total_per_rom = array();
                        foreach ($table_rom->result_array() as $key) {
                          $total_per_rom['plan_' . $key['rom_id']] = array();
                          $total_per_rom['actual_' . $key['rom_id']] = array();
                          $total_per_rom['plan_product_' . $key['rom_id']] = array();
                          $total_per_rom['actual_product_' . $key['rom_id']] = array();


                          echo '<td nowrap style="text-align:center;">';

                          foreach ($cargo_per_rom['rom_'.$key['rom']] as $val) {
                            // $color = explode(',', $val['color']);
                            if ($val['plan_' . $h_jam] != 0 || $val['actual_' . $h_jam] != 0) {
                              echo '<div style="border-bottom: 1px solid #fff;margin: -8px;padding: 8px; " >'.$val['material'].'</div>';
                            }
                          }
                          echo '</td>';

                          echo '<td nowrap style="text-align:center;">';
                          foreach ($cargo_per_rom['rom_'.$key['rom']] as $val) {
                            $tot = $val['plan_' . $h_jam];
                            $product = ($val['plan_' . $h_jam]*$val['cv_ar']);
                            if ($val['plan_' . $h_jam] != 0 || $val['actual_' . $h_jam] != 0) {
                              echo '<div style="border-bottom: 1px solid #fff;margin: -8px;padding: 8px;">'.$tot.'</div>';
                            }

                            array_push($total_per_rom['plan_' . $key['rom_id']],$tot);
                            array_push($total_per_rom['plan_product_' . $key['rom_id']],$product);
                            
                          }
                          echo '</td>';
                          
                          echo '<td nowrap style="text-align:center;">';
                          foreach ($cargo_per_rom['rom_'.$key['rom']] as $val) {

                            $tot = $val['actual_' . $h_jam];
                            $product = ($val['actual_' . $h_jam]*$val['cv_ar']);
                            if ($val['plan_' . $h_jam] != 0 || $val['actual_' . $h_jam] != 0) {
                              echo '<div style="border-bottom: 1px solid #fff;margin: -8px;padding: 8px;">'.$tot.'</div>';
                            }

                            array_push($total_per_rom['actual_' . $key['rom_id']],$tot);
                            array_push($total_per_rom['actual_product_' . $key['rom_id']],$product);
                          }
                          echo '</td>';
                          
                          echo '<td></td>';
                          
                          echo '<td style="text-align:center;">';
                          foreach ($cargo_per_rom['rom_'.$key['rom']] as $val) {
                            if ($val['plan_' . $h_jam] != 0 || $val['actual_' . $h_jam] != 0) {
                              echo '<div style="border-bottom: 1px solid #fff;margin: -8px;padding: 8px;">'.($val['plan_' . $h_jam]-$val['actual_' . $h_jam]).'</div>';
                            }
                          }
                          echo '</td>';


                          echo '<td style="background-color: white; color: white;">&nbsp;</td>';
                        }
                        ?>
                      </tr>
                      <tr>
                        <?php
                        $total_plan_all_rom = array();
                        $total_actual_all_rom = array();
                        $total_plan_product_all_rom = array();
                        $total_actual_product_all_rom = array();
                        foreach ($table_rom->result_array() as $key) {
                          $plan = array_sum($total_per_rom['plan_' . $key['rom_id']]);
                          $actual = array_sum($total_per_rom['actual_' . $key['rom_id']]);
                          $plan_product = array_sum($total_per_rom['plan_product_' . $key['rom_id']]);
                          $actual_product = array_sum($total_per_rom['actual_product_' . $key['rom_id']]);
                          array_push($total_plan_all_rom, $plan);
                          array_push($total_actual_all_rom, $actual);
                          array_push($total_plan_product_all_rom, $plan_product);
                          array_push($total_actual_product_all_rom, $actual_product);
                          echo '<th nowrap style="background-color: blue; color: #ffffff; text-align:center;">Total</th>';

                          echo '<th nowrap style="background-color: blue; color: #ffffff; text-align:center;">'.$plan.'</th>';
                          
                          echo '<th nowrap style="background-color: blue; color: #ffffff; text-align:center;">'.$actual.'</th>';
                          
                          echo '<td colspan="3" style="background-color:white;"></td>';
                        }

                        $total_plan_product_all_rom = array_sum($total_plan_product_all_rom);
                        $total_actual_product_all_rom = array_sum($total_actual_product_all_rom);

                        $total_plan = array_sum($total_plan_all_rom);
                        $total_actual = array_sum($total_actual_all_rom);

                        $plan = $total_plan_product_all_rom != 0 || $total_plan != 0 ? $total_plan_product_all_rom/$total_plan : 0;
                        $actual = $total_actual_product_all_rom != 0 || $total_actual != 0 ? $total_actual_product_all_rom/$total_actual : 0;

                        $hasil = @number_format($actual-$plan,0);
                        $warna = colored_deviasi($hasil);
                        ?>
                      </tr>
                      <tr>
                        <td colspan="2">Total Plan</td><td><?= $total_plan;?></td>
                      </tr>
                      <tr>
                        <td colspan="2">Total Actual</td><td><?= $total_actual;?></td>
                      </tr>
                      <tr>
                        <th style="background-color: blue; color: white; text-align: center;">Product</th>
                        <th style="background-color: blue; color: white; text-align: center;">Cal (ar)</th>
                        <th style="background-color: blue; color: white; text-align: center;">Deviasi</th>
                      </tr>
                      <tr>
                        <td>PLAN</td>
                        <td><?= number_format($plan,0);?></td>
                        <td rowspan="2" style="text-align: center; <?=$warna;?>"><?=$hasil;?></td>
                      </tr>
                      <tr> 
                        <td>ACTUAL</td>
                        <td><?= number_format($actual,0);?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
          </div>
        </div>

      <?php endfor;?>

        
      </div>     
    </div>
  </section>
</div>

<script type="text/javascript">

</script>