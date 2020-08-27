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
              <h4><p style="padding: 0 15px">Report ROM:</p></h4>
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
                <?php endforeach;?> 
          </div>
        </div>
      </div>
      <?php else:?>
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border"> 
            <a href="<?php echo base_url("exports/populasi");?>" class="btn btn-success">
              <i class="fa  fa-file-excel-o"> Export to Excel</i>
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


</script>