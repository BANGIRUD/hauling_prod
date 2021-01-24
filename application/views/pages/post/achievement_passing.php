<script src="<?php echo base_url('___/bower_components/chart.js/Chart.min.js');?>"></script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Achievement Passing
      <small>Shift <?=$shift?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Achievement Passing <?=get_enum($this->session->userdata('area'))?></li>
    </ol></br>
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label>Select Date :</label>
          <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input style="padding: 0;" type="date" name="date" class="form-control" value="<?= date('Y-m-d');?>">
                    </div>
          </div>
        </div>
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
            <h3 style="text-align: center">Achievement Passing KM 34</h3>
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
                    <th colspan="2" style="text-align: center;">Passing</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Ach Quality</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Status</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Remark</th>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Plan</th>
                    <th style="text-align: center;">Actual</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 0;                    
                    $label_js = '';
                    $plan_jam = '';
                    $actual_jam = '';
                    $percent_jam = '';
                    $sum_plan = '';
                    $sum_actual = '';
                    $sum_percent = '';
                    $total_plan = array();
                    $total_act = array();
                    foreach ($rows as $row) {
                    $no++;
                    $a = $row['jam'];
                      if ($a >= 24) $a = $a - 24;
                        $b = $a + 1;
                      if ($b > 23) $b = ($b - 24);
                      if ($a < 10) 
                        $a = '0'.$a;
                      if ($b < 10) 
                        $b = '0'.$b;
                        $c = $a . '-' . ($b) ;
                        $total_plan[] = $row['jam_'.$no];
                        $total_act[] = $row['actual'];
                        $percent = $row['jam_'.$no] != 0 || $row['actual'] != 0? $row['actual']/$row['jam_'.$no]*100 : 0;
                        $label_js .= "'".$c ."'," ;
                        $plan_jam .= $row['jam_'.$no]."," ;
                        $actual_jam .= $row['actual']."," ;
                        $percent_jam .= number_format($percent,1)."," ;
                        $sum_plan = @array_sum($total_plan);
                        $sum_actual = @array_sum($total_act);
                        $sum_percent = $sum_plan != 0 || $sum_actual != 0? $sum_actual/$sum_plan*100 : 0;
                    echo '<tr>';
                      echo '<td>'.$c.'</td>';
                      echo '<td>'.$row['jam_'.$no].'</td>';
                      echo '<td>'.$row['actual'] .'</td>';
                      echo '<td>'.number_format($percent, 1).' %</td>';
                      echo '<td>
                              <select class="form-control status-post" data-toggle="tooltip" data-placement="top" title="Click here to edit" data-shift="' . $shift . '" data-time="' . $a . '" data-date="' . $date . '">
                                <option value=""></option>';
                                  foreach ($status_passing as $value) {
                                    if($value['name'] == $row['status']) {
                                      echo '<option value="'.$value['name'].'" selected>'.$value['name'].'</option>';
                                    } else {
                                      echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                                    }
                                  }
                        echo '</select>
                            </td>';
                      echo '<td><input type="text" name="keterangan" class="form-control keterangan-post" data-shift="' . $shift . '" data-time="' . $a . '" data-date="' . $date . '" value="'.$row['keterangan'].'"/></td>';
                    echo '</tr>';
                    }
                  ?>
                          <tr style="background-color: #74b9ff; font-weight: bolder;">
                            <td>Total</td>
                            <td><?=$sum_plan;?></td>
                            <td><?=$sum_actual;?></td>
                            <td><?=@number_format($sum_percent, 1);?> %</td>
                          </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">PASSING PLAN VS ACTUAL DISPATCH 34</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="container">
                <canvas id="canvas" style="width: 100px;"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      <!-- <div class="col-md-12">
        <div id="container" >
          <canvas id="canvas"></canvas>
        </div>
      </div> -->
  </section>
</div>

<script type="text/javascript">

  $('.datepicker').datepicker({
    autoclose: true
  });
  
  $(document).on("change", ".status-post", function() {
    var date = $( this ).attr('data-date');
    var shift = $( this ).attr('data-shift');
    var time = $( this ).attr('data-time');
    var status = $( this ).val();
      $.ajax({
        type: 'POST',
        data: 'date=' + date + '&shift=' + shift + '&time=' + time + '&status=' + status,
        url: "<?php echo base_url('Post/status_passing/');?>",
        dataType: 'JSON',
        error: function () {
          console.log("errr");
        }
      });
  });

  $(document).on("change", ".keterangan-post", function() {
    var date = $( this ).attr('data-date');
    var shift = $( this ).attr('data-shift');
    var time = $( this ).attr('data-time');
    var keterangan = $( this ).val();
    $.ajax({
      type: 'POST',
      data: 'date=' + date + '&shift=' + shift + '&time=' + time + '&keterangan=' + keterangan,
      url: "<?php echo base_url('Post/keterangan_status_passing/');?>",
      dataType: 'JSON',
      
      error: function () {
        console.log("errr");
      }
    });
  });

 var chartData = {
    labels: [<?=$label_js?>],
      datasets: [{
        type: 'line',
        label: 'Quality',
        borderColor: '#ffd32a',
        borderWidth: 4,
        fill: false,
        data: [<?=$percent_jam?>]
      }, {
        type: 'bar',
        label: 'Plan',
        backgroundColor: '#17c0eb',
        data: [<?=$plan_jam?>],    
      }, {
              type: 'bar',
              label: 'Actual',
              backgroundColor: '#ff3838',
              borderColor: 'white',
              borderWidth: 2,
              data: [<?=$actual_jam?>]
          }]

      };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myMixedChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
          responsive: true,
          title: {
            display: true,
          },
          tooltips: {
            mode: 'index',
            intersect: false
          },
          legend:{
            position: 'bottom',
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 15,
              bottom: 0
            }
          },
          animation: {
                duration : 1,
                onComplete : function() {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                    ctx.fillStyle = '#000'
                    // Chart.defaults.global.defaultFontColor = '#000';
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.fontColor = 'red';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function(dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            if (dataset.data[index] > 0) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y);
                            }
                        });
                    });
                }
            }
        }
      });
    }; 
</script>


<!-- 


                  //       $jam = 6;

                  
                        
                  //       for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
                  //         if ($a >= 24) {
                  //           $a = $a - 24;
                  //         }
                  //         $b = $a + 1;
                  //         if ($b > 23) {
                  //           $b = ($b - 24);
                  //         }
                  //         if ($a < 10) {
                  //           $a = '0'.$a;
                  //         }
                  //         if ($b < 10) {
                  //           $b = '0'.$b;
                  //         }
                  //         if ($a == 7) {
                  //           $c = $a . '-' . ($b) ;
                  //         }else{
                  //           $c = $a . '-' . ($b);
                  //         }

                  //         $total_plan[] = $data['jam_'.$i];
                  //         $total_act[] = $data['actual_'.$i];

                         

                  //         $percent = $data['jam_'.$i] != 0 || $data['actual_'.$i] != 0? $data['actual_'.$i]/$data['jam_'.$i]*100 : 0;


                  //         $label_js .= "'".$c ."'," ;
                  //         $plan_jam .= $data['jam_'.$i]."," ;
                  //         $actual_jam .= $data['actual_'.$i]."," ;
                  //         $percent_jam .= number_format($percent,1)."," ;
                  
                  //       echo    '<tr>
                  //             <td>'.$c.'</td>
                  //             <td>'.$data['jam_'.$i].'</td>
                  //             <td>'.$data['actual_'.$i].'</td>
                  //             <td>'.number_format($percent, 1).' %</td>

                  //             <td>
                  //             <select class="form-control status-post" data-toggle="tooltip" data-placement="top" title="Click here to edit" data-shift="' . $shift . '" data-time="' . $a . '" data-date="' . $date . '">
                  //             <option value=""></option>';

                  //             foreach ($status_passing as $value) {
                  //               if($value['name'] == $data['status_'.$i]) {
                  //                 echo '<option value="'.$value['name'].'" selected>'.$value['name'].'</option>';
                  //               } else {
                  //                 echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                  //               }
                  //             }

                  //             echo '</select>
                  //             </td>

                  //             <td><input type="text" name="keterangan" class="form-control keterangan-post" data-shift="' . $shift . '" data-time="' . $a . '" data-date="' . $date . '" value="'.$data['keterangan_'.$i].'"/></td>
                  //           </tr>';
                  // }


         

  