<?php
$by_rom   = $this->session->userdata('rom');
$by_level   = $this->session->userdata('level');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Report ROM</li>
    </ol>
  </section>
  <section class="content">
    <form method="GET">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Date :</label>
                    <div class="input-group date">
                      <div class="input-group-addon" style="background-color: #e9ecef"> <i class="fa fa-calendar"></i></div>
                      <input style="padding: 0;" type="date" name="date" class="form-control" value="<?= date('Y-m-d', strtotime($date));?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Rom :</label>
                    <select class="form-control" name="by_rom" id="by_rom">                  
                      <option value=""> ALL </option>
                      <?php foreach ($rom as $value) {
                        $select = $value['id'] == $by_rom_id ? ' selected': '';
                        echo '<option value="'.$value['id'].'"'.$select.'>'.$value['name'].' </option>';
                      }?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>&nbsp;</label></br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="background-color: #2e86de ; color: #ffffff ">
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">C/N</th>
                      <th style="text-align: center;">Cargo Muatan</th>  
                      <th style="text-align: center;">ROM</th>              
                      <th style="text-align: center;">Time In</th>               
                      <th style="text-align: center;">Time Out</th>
                    </tr>                  
                  </thead>
                  <tbody>
                    <?php 
                    $no = 0;
                    foreach ($data as $value) {
                      $no++; 
                      $color = explode(',', $value['color']);
                      echo '<tr style="text-align: center;">';
                      echo '<td>'.$no.'</td>
                      <td>'.$value['cn_unit'].'</td>
                      <td style="background-color:'. $color[0] . ';color:'.@$color[1].'" >'.$value['cargo'].'</td>
                      <td>'.$value['rom_name'].'</td>
                      <td>'.$value['time_in'].'</td>
                      <td>'.$value['time_out'].'</td>';
                      echo '</tr>';
                    }
                    ?>
                  </tbody>  
                </table>
              </div>  
            </div>          
          </div>
        </div>      
      </div>
    <form method="GET">
  </section>
</div>
<!-- Modal edit rom -->


<script type="text/javascript">
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,       
      dom: 'Bfrtip',
      buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
      ]
    })
  });

  $(document).on('click', '#export_report_rom', function(e) {
    var date  = $("#filter_date").val();
    var shift = $("#page-shift.active").attr('data-id');
    var pit   = $('#filter_pit').val();
    window.open('<?php echo base_url('Exports/Export_prodproblem/save');?>/'+ date + '/' + shift + '/' + pit);
  });

</script>