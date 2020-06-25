<script src="<?php echo base_url('___/bower_components/chart.js/Chart.min.js');?>"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box ">
            <div class="box-header with-border">
              <h3 style="text-align: center">Quality Control Dispatch KM 34</h3>
            </div>
          </div>
        </div>
        <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">  
            <div class="table-responsive">
              <table class="table table-bordered table-striped passing" id="" >
                <thead style="background-color: #74b9ff;">
                  <tr>
                    <th rowspan="2">Time</th>
                    <th colspan="2" style="text-align: center;">Passing</th>
                    <th rowspan="2" style="text-align: center;">Ach Quality</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">Keterangan</th>
                  </tr>
                  <tr>
                    <th style="text-align: center;">Plan</th>
                    <th style="text-align: center;">Actual</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                        $jam = 6;

                        $label_js = '';
                        $plan_jam = '';
                        $actual_jam = '';
                        $percent_jam = '';

                        if ($shift == 2) {
                          $jam = 18;

                        }
                        for ($a=$jam, $i = 1; $i <= 12; $i++, $a++) { 
                          if ($a >= 24) {
                            $a = $a - 24;
                          }
                          $b = $a + 1;
                          if ($b > 23) {
                            $b = ($b - 24);
                          }
                          if ($a < 10) {
                            $a = '0'.$a;
                          }
                          if ($b < 10) {
                            $b = '0'.$b;
                          }
                          if ($a == 7) {
                            $c = $a . '-' . ($b) ;
                          }else{
                            $c = $a . '-' . ($b);
                          }

                          $total_plan[$i][] = $data['jam_'.$i];
                          $total_act[$i][]  = $data['actual_'.$i];                     

                          $percent = $data['jam_'.$i] != 0 || $data['actual_'.$i] != 0? $data['actual_'.$i]/$data['jam_'.$i]*100 : 0;


                          $label_js .= "'".$c ."'," ;
                          $plan_jam .= $data['jam_'.$i]."," ;
                          $actual_jam .= $data['actual_'.$i]."," ;
                          $percent_jam .= $percent."," ;
                  
                  echo    '<tr>
                              <td>'.$c.'</td>
                              <td>'.$data['jam_'.$i].'</td>
                              <td>'.$data['actual_'.$i].'</td>
                              <td>'.number_format($percent, 1).' %</td>

                              <td>
                              <select class="form-control status-post" data-toggle="tooltip" data-placement="top" title="Click here to edit" data-shift="' . $shift . '" data-time="' . $a . '" data-date="' . $date . '">
                              <option value="">Click to Edit</option>';

                              foreach ($status_passing as $value) {
                                if($value['name'] == $data['status_'.$i]) {
                                  echo '<option value="'.$value['name'].'" selected>'.$value['name'].'</option>';
                                } else {
                                  echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                                }
                              }

                              echo '</select>
                              </td>

                              <td><input type="text" name="keterangan" class="form-control keterangan-post" data-shift="' . $shift . '" data-time="' . $a . '" data-date="' . $date . '" value="'.$data['keterangan_'.$i].'"/></td>
                            </tr>';
                  }?>
                  <tr style="background-color: #74b9ff; font-weight: bolder;">
                    <td>Total</td>
                    <td>...</td>
                    <td>...</td>
                    <td>... %</td>
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

      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: {
      labels: [<?=$label_js?>],
      datasets: [
       {
        label: 'Plan',
        backgroundColor: 'blue',
        borderWidth: 2,
        data: [<?=$plan_jam?>]
      }, {
            label: 'Actual',
            data: [<?=$actual_jam?>],
            backgroundColor: 'red', 
            borderWidth: 2,
            type: 'bar'
        },{
            label: 'Quality',
            data: [<?=$percent_jam?>],
            borderColor: 'yellow',
            fill: false,

            // Changes this dataset to become a line
            type: 'line'
        }]

    },
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'PASSING PLAN VS ACTUAL DISPATCH 34'
          },
          scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
   }
        }
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
  </script>