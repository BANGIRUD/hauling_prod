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
                      foreach ($table as $value) :
                        $kosongan[$value['rom_id']] = $this->shift_ops->achievement_rom_rtk($value['rom_id'])->row_array();
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
                      for ($a=($hour-2) ,$i=1; $i <= 12; $i++, $a++) :
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
                          echo '<td nowrap>' . $c . '</td>';
                          foreach ($table as $value) :
                            // print_r($value['jam_'.$i] );
                            $callback_kosongan = $kosongan[$value['rom_id']];
                            $val = !empty(@$callback_kosongan['kosongan_'.$i]) ? @$callback_kosongan['kosongan_'.$i] : 0;
                            echo '<td style="text-align: center; vertical-align: middle; background-color: #ffffff">' . $value['jam_'.$i] . '</td>';
                            // echo '<td>' . '</td>';
                            echo '<td style="text-align: center; vertical-align: middle; background-color: #ffffff">' . @$val . '</td>';
                            echo '<td style="text-align: center; vertical-align: middle; background-color: #ffffff">' . $value['actual_'.$i] . '</td>';
                          endforeach;
                          $callback_kosongan = $kosongan[$value['rom_id']];
                          $val = !empty(@$callback_kosongan['kosongan_'.$i]) ? @$callback_kosongan['kosongan_'.$i] : 0;
                          echo '<td style="text-align:center;">'.@$val.'</td>';
                          echo '<td style="text-align:center;">'.$value['actual_'.$i].'</td>';
                          echo '<td style="text-align:center;">'.$value['actual_'.$i].'</td>';
                          echo '<td style="text-align:center;">'.$value['actual_'.$i].'</td>';
                        echo '<tr>';
                      endfor;
                        // echo '<tr style="background-color: white; color: white;">
                        //         <td></td>
                        //       </tr>';

                        echo '<tr>
                                <th style="text-align:center; background-color : #74b9ff;">Total</th>
                                <th style="text-align:center; background-color : #74b9ff;">1</th>';

                        echo '</tr>';      
                    ?>
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
</script>