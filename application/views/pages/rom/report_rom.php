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
    <div class="row">
      <?php if ($by_level == 'administrator' || $by_level == 'dispatcher'):?>
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border"> 
              <!-- <h4><p style="padding: 0 15px">Report ROM:</p></h4>
              <?php $no=0;
                echo '<a class="btn btn-app bg-maroon" href="'.base_url('Dash/report_rom/').'"><i class="fa fa-list"></i>ALL</a>';
                echo '<a class="btn btn-app bg-green pull-right" href="'.base_url('Dash/daily_rom_operations/').'"><i class="fa fa-file-excel-o"></i>Export to Excel</a>';
                foreach ($rom as $value):$no++;
                  if ($no % 2 == 0) {
                    echo '<a class="btn btn-app bg-olive" href="'.base_url('Dash/report_rom/'.$value['id']).'"><i class="fa fa-inbox"></i>'.$value['name'].'</a>';
                  }else{
                    echo '<a class="btn btn-app bg-orange" href="'.base_url('Dash/report_rom/'.$value['id']).'"><i class="fa fa-inbox"></i>'.$value['name'].'</a>';
                  }
                ?>
                <?php endforeach;?>  -->
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label>Date :</label>
                <div class="input-group date">
                  <div class="input-group-addon" style="background-color: #e9ecef"> <i class="fa fa-calendar"></i></div>
                  <input  type="text" name="date" class="form-control datepicker" value=" <?= date('m/d/Y', strtotime($date));?>">
                </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Shift :</label>
                  <select class="form-control" name="rom" id="rom">                    
                    <option value=""> ALL </option>
                    <?php foreach ($rom as $value) {
                      $select = $key['code'] == $shift ? ' selected': '';
                        echo '<option value="'.$value['name'].'"'.$select.'>'.$value['name'].' </option>';
                    }?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>&nbsp;</label></br>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                  <a href="#" id="export_report_rom" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php else:?>
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border"> 
            <a href="<?php echo base_url("exports/populasi");?>" class="btn btn-success">
              <i class="fa fa-file-excel-o"> Export to Excel</i>
            </a>
          </div>
        </div>
      </div>
      <?php endif?>  
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
        buttons: [
      'print'
        ]
    })
  });

  $('.datepicker').datepicker({
    autoclose: true
  });

  $(document).on('click', '#export_report_rom', function(e) {
  var date  = $("#filter_date").val();
  var shift = $("#page-shift.active").attr('data-id');
  var pit   = $('#filter_pit').val();
  window.open('<?php echo base_url('Exports/Export_prodproblem/save');?>/'+ date + '/' + shift + '/' + pit);
});

</script>