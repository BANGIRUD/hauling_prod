<?php
  $by_area   = $this->session->userdata('area');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Monitoring Data
      <small><?=get_enum($by_area)?> Shift </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Monitoring Data <?=get_enum($by_area)?></li>
    </ol></br>
    <div class="row">
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
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
          $jam = 4;
          if ($shift == 2) {
            $jam = 16;
          }
          for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) :
            
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
                      <tr style="background-color: blue; color: white;">
                        <th colspan="3"><?= $a_jam . '-' . $b_jam;?></th>
                      </tr>
                      <tr style="background-color: blue; color: white;">
                        <?php foreach ($table_rom->result_array() as $key) {
                          echo '<th colspan="5">'.$key['rom_spp'].'</th>';
                        }
                        ?>
                      </tr>
                      <tr style="background-color: blue; color: white;">
                        <?php foreach ($table_rom->result_array() as $key) {
                          echo '<th>Time</th><th>Truck No</th><th>Material</th><th>Area</th><th>Status</th>';
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($table_rom->result_array() as $key) {
                         echo '<th>Time</th><th>Truck No</th><th>Material</th><th>Area</th><th>Status</th>';
                      }?>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td>
                      </tr>
                      <tr>
                        <td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td>0</td><td>290</td><td>T300 CT1</td><td>KM 69</td><td>REG</td><td></td><td></td><td></td><td></td><td></td>
                      </tr>
                      <tr style="background-color: grey; color: white;">
                        <td>Cargo</td><td>Plan</td><td>Actual</td><td></td><td>Kurang</td><td>Cargo</td><td>Plan</td><td>Actual</td><td></td><td>Kurang</td><td>Cargo</td><td>Plan</td><td>Actual</td><td></td><td>Kurang</td><td>Cargo</td><td>Plan</td><td>Actual</td><td></td><td>Kurang</td><td>Cargo</td><td>Plan</td><td>Actual</td><td></td><td>Kurang</td>
                      </tr>
                      <tr>
                        <td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td>
                      </tr>
                      <tr>
                        <td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td><td>T300 CT1</td><td>4</td><td>5</td><td></td><td>-1</td>
                      </tr>
                      <tr>
                        <td>Total</td><td>4</td><td>5</td><td></td><td></td><td>Total</td><td>4</td><td>5</td><td></td><td></td><td>Total</td><td>4</td><td>5</td><td></td><td></td><td>Total</td><td>4</td><td>5</td><td></td><td></td><td>Total</td><td>4</td><td>5</td><td></td><td></td>
                      </tr>
                      <tr>
                        <td colspan="2">Total Plan</td><td>31</td>
                      </tr>
                      <tr>
                        <td colspan="2">Total Actual</td><td>31</td>
                      </tr>
                      <tr>
                        <td>PRODUCT</td>
                        <td>Cal (ar)</td>
                        <td>Deviasi</td>
                      </tr>
                      <tr><td>PLAN</td><td>4.777</td><td rowspan="2">0</td></tr>
                      <tr><td>Actual</td><td>4.777</td></tr>
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