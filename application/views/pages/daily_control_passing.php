<style type="text/css">
  table.passing{
    /*table-layout: fixed;*/
  }

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quality Control Passing
      <small>Shift <?=$shift?></small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Quality Control Passing</li>
      </ol>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="text-align: center">Quality Control Dispatch KM 34</h3>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">  
              <div class="table-responsive">
                <table class="table table-bordered table-striped passing" id="" >
                  <thead class="text-center border" style="background-color: #2e86de ; color: #ffffff "> 
                    <tr>
                      <th rowspan="2" nowrap style="text-align: center; vertical-align: middle;">Raw Material</th>
                      <?php
                          $jam = 6;
                          if ($shift == 2) {
                            $jam = 18;

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
                            echo '<th colspan="3" width="120" style="text-align: center;"> ' .$b. ' </th>' ; 

                        }?>
                    </tr>
                    <tr>
                    <?php for ($a=$jam, $i = 1; $i <= 12; $i++, $a++):?>
                      <th width="500" style="text-align: center;">Plan</th>
                      <th nowrap style="text-align: center;">Actual</th>
                      <th style="text-align: center;">%</th>
                    <?php endfor;?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $value) :?>
                    <tr>
                      <td nowrap><?= $value['material'];?></td>
                      <?php for ($a=$jam, $i = 1; $i <= 12; $i++, $a++):
                        $total[$i][] = $value['jam_'.$i];

                        $total_act[$i][] = $value['actual_'.$i];

                        $percent = $value['jam_'.$i] != 0 || $value['actual_'.$i] != 0? $value['actual_'.$i]/$value['jam_'.$i]*100 : 0;
                        ?>
                      <td><?= $value['jam_'.$i];?></td>
                      <td><?= $value['actual_'.$i];?></td>
                      <td><?= number_format($percent, 1);?>%</td>
                    <?php endfor;?>
                    </tr>
                    <?php endforeach;?>
                    <tr style="background-color: #2e86de ; color: #ffffff ">
                      <td>Total</td>
                      <?php for ($a=$jam, $i = 1; $i <= 12; $i++, $a++):
                        $sum_plan = @array_sum($total[$i]);

                        $sum_actual = @array_sum($total_act[$i]);
                        $sum_percent = $sum_plan != 0 || $sum_actual != 0 ? $sum_actual/$sum_plan*100 : 0;
                        ?>
                      <td><?= $sum_plan;?></td>
                      <td><?= $sum_actual;?></td>
                      <td nowrap><?= number_format($sum_percent, 1);?> %</td>
                    <?php endfor;?>
                    </tr>
                    <tr>
                      <td>CV</td>
                      <?php for ($a=$jam, $i = 1; $i <= 12; $i++, $a++):
                        $sum_plan = @array_sum($total[$i]);

                        $sum_actual = @array_sum($total_act[$i]);
                        $sum_percent = $sum_plan != 0 || $sum_actual != 0 ? $sum_actual/$sum_plan*100 : 0;
                        ?>
                      <td>...</td>
                      <td>...</td>
                      <td nowrap>... %</td>
                    <?php endfor;?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>          
    </div>
  </section>
</div>
