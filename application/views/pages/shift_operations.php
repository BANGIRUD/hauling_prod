<?php
  $username   = $this->session->userdata('username');
  $name   = $this->session->userdata('name');
  $level    = $this->session->userdata('level');
?>
<style type="text/css">
  
</style>
<div class="content-wrapper"><!-- Content Header (Page header) -->
  
  <section class="content-header">
    <h1>
      Record
      <small>Production</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Record production</li>
    </ol>
  </section>   
  <section class="content"><!-- Main content -->
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i> Add Unit
              </button>           
              <a href="<?php echo base_url('Dash/add_unit');?>" class="btn btn-success">
                <i class="fa fa-list-ul"> Add Multiple Unit</i>
              </a>
            
            <a href="" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="<?php echo base_url('Dash/shift_operations/standby');?>" class="btn btn-primary">Standby</a>
            <a href="<?php echo base_url('Dash/shift_operations/l');?>" class="btn btn-warning">Operation</a>
            <a href="<?php echo base_url('Dash/shift_operations/');?>" class="btn btn-info">All</a>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <?= $this->session->flashdata('msg');?>
        <div class="box">
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="background-color: #2e86de ; color: #ffffff ">
                  <th>&nbsp;</th>
                  <th>No</th>
                  <th>C/N</th>
                  <th>Code Standby</th>                  
                  <th>Posisi (M/K)</th>
                  <th>Cargo Muatan</th>
                  <th>Remark</th>
                  <th>Passing</th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Hour Stb</th>
                  <th>Location</th>
                  <th>CSA</th>
                  <th>Time OS</th>
                  <th>Reg</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 0;
                      foreach ($data as $value) {
                    $no++; 
                      echo '<tr>
                              <td nowrap>
                                <a href="#" class="btn btn-xs btn-warning" id="up" data-id="" data-column="cancel" data-text=" " title="Up"><i class="fa  fa-arrow-up"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-warning" id="down" data-id="" data-column="cancel" data-text=" " title="Down"><i class="fa  fa-arrow-down"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-primary" data-target="#editdata" id="edit" data-id="'.$value['id'].'" data-original-title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i>
                                </a>';
                                if($value['operation'] == 0 && strtolower($value['code_stby']) != 'l') : 
                      echo ' <a href="#" class="btn btn-xs btn-success" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Ready" data-toggle="tooltip"><i class="fa fa-check"></i>
                                </a>';
                              else:
                                echo ' <a href="#" class="btn btn-xs btn-danger" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Cancel" data-toggle="tooltip"><i class="fa fa-remove"></i>
                                </a>';
                              endif;
                        echo '</td>
                              <td>'. $no.'</td>
                              <td>'.$value['cn_unit'].'</td>
                              <td>'.$value['code_stby'].'</td>
                              <td>'.$value['position'].'</td>
                              <td>'.$value['cargo'].'</td>  
                              <td>'.$value['remark'].'</td>
                              <td>'.date('H',strtotime($value['time_passing'])).'</td>
                              <td>'.$value['date'].'</td>
                              <td>'. date('H:i',strtotime($value['time_in'])).'</td>';
                              if (strtolower($value['code_stby']) == 'l') {
                                $timeout = date('H:i',strtotime($value['time_out']));
                              } else {
                                $timeout = $value['operation'] == 0 ? '-' : date('H:i',strtotime($value['time_out']));
                              }
                        
                        echo '<td>'. $timeout .'</td>';
                        $timestb = $value['operation'] == 0 ? '-' : date('H:i',strtotime(selisih_hour($value['time_in'],$value['time_out'])));
                        echo '<td>'.$timestb.'</td>
                              <td>'.$value['location_description'].'</td>
                              <td>'.$value['csa'].'</td>
                              <td>'.$value['time'].'</td>';
                                if ($value['register'] == 'reg') {
                                 echo '<td>Register</td>';
                                }
                                else{
                                  echo'<td>Unregister</td>';
                                }
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
  </section><!-- /.content -->
</div>

<div class="modal fade" id="modal-default" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Default Modal</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
          <div class="form-body">
            <div class="row">
              <div class="col-xs-4">
                <label>Date</label>
                <div class="input-group date">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  <input type="text" name="date" class="form-control datepicker" value="<?= date('m/d/Y');?>">
                </div>
              </div>
              <div class="col-xs-4">
                <label>Shift</label>
                <select class="form-control" name="shift" id="shift">
                  <?php foreach ($shift as $key) {
                    echo '<option value="'.$key['code'].'">'.$key['name'].' </option>';
                  }?>
                  </select>
              </div>   
              <?php if ($level == 'administrator'): ?>
              <div class="col-xs-4">
                <label>Area</label>
                <select class="form-control" name="area" id="area">
                  <?php foreach ($area as $value) {
                    echo '<option value="'.$value['code'].'">'.$value['name'].' </option>';
                  }?>
                </select>
              </div>
              <?php else:?>
              <div class="col-xs-4">
                <label>ID Unit</label>
                <input class="form-control" type="id_unit" name="id_unit" placeholder="Enter Unit ID">
              </div>
              <?php endif;?>  
            </div>  
          </div>
        </div>
        <div class="form-group">
          <div class="form-body">
            <div class="row">
              <?php if ($level == 'administrator'):?>
              <div class="col-xs-4">
                <label>ID Unit</label> 
                <input class="form-control" type="id_unit" name="id_unit" placeholder="Enter Unit ID">
              </div>
              <div class="col-xs-4">
                <label>Posisi (M/K)</label> 
                <select class="form-control" name="posisi" id="posisi">
                  <?php foreach ($posisi as $value) {
                    echo '<option value="'.$value['code'].'">'.$value['name'].' </option>';
                  }?>
                </select>
              </div>
              <div class="col-xs-4">
                <label>Cargo Muatan</label> 
                <select class="form-control" name="material" id="material">
                  <?php foreach ($material as $value) {
                    echo '<option value="'.$value['code'].'">'.$value['name'].' </option>';
                  }?>
                </select>
              </div>
              <?php else:?>
                <div class="col-xs-4">
                  <label>Posisi (M/K)</label> 
                  <select class="form-control" name="posisi" id="posisi">
                  <?php foreach ($posisi as $value) {
                    echo '<option value="'.$value['code'].'">'.$value['name'].' </option>';
                  }?>
                </select>
                </div>
                <div class="col-xs-4">
                  <label>Cargo Muatan</label> 
                  <select class="form-control" name="material" id="material">
                  <?php foreach ($material as $value) {
                    echo '<option value="'.$value['code'].'">'.$value['name'].' </option>';
                  }?>
                </select>
                </div>
                <div class="col-xs-4">
                  <label>Code Standby</label> 
                 <select class="form-control" name="code_stby" id="code_stby">
                  <?php foreach ($code_stby as $value) {
                    echo '<option value="'.$value['id'].'">'.$value['code'].' </option>';
                  }?>
                </select>
                </div>
              <?php endif;?> 
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-body">
            <div class="row">
              <?php if($level == 'administrator'):?>
              <div class="col-xs-4">
                <label>Code Standby</label> 
                <select class="form-control" name="code_stby" id="code_stby">
                  <?php foreach ($code_stby as $value) {
                    echo '<option value="'.$value['id'].'">'.$value['code'].' </option>';
                  }?>
                </select>
              </div>
              <div class="col-xs-4">
                <label>Date In</label> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="">
                </div>
              </div>
              <div class="col-xs-4">
                <label>Time In</label>
                <div class="input-group">
                  <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in" value="">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
              </div>
              <?php else :?> 
                <div class="col-xs-4">
                <label>Date In</label> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="">
                </div>
              </div>
              <div class="col-xs-4">
                <label>Time In</label>
                <div class="input-group">
                  <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in" value="">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
              </div>
          <?php endif;?>
          </div>
        </div>
      </div>
        <div class="form-group">
          <div class="form-body">
            <div class="row">
              <div class="col-xs-4">
                <label>Date Out</label> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="">
                </div>
              </div>
              <div class="col-xs-4">
                <label>Time Out</label>
                <div class="input-group">
                  <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in" value="">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <label>Time Passing</label>
                <div class="input-group">
                  <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in" value="">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-body">
            <div class="row">
              <div class="col-xs-12">
                <label>Remark</label>
                <textarea class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"><!-- Modal Edit Unit -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Edit/edit_shift_operation');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="mediumModalLabel">Edit Data</h4>
        </div>
        <div class="modal-body" id="modal-body-edit">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>

      </form>

    </div>
  </div>
</div><!-- .Modal -->

<script type="text/javascript">
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      buttons: [
        'print'
    ]
    })
  });

  $('#modal-default').on('shown.bs.modal', function () {
    $('#id_unit').focus();
    var d = new Date();
    var H = (d.getHours() < 10) ? '0' + d.getHours() : d.getHours();
    var m = (d.getMinutes() < 10) ? '0' + d.getMinutes() : d.getMinutes();
    $("#input-time-in").val(H+':'+m);

  });

  $('.datepicker').datepicker({
      autoclose: true
  });

  $(document).on('change','#position', function() {
    var val = $(this).val();
    if(val == 6) {
      $('#cargo_muatan').val('Kosongan');
      $('#cargo_muatan').attr('readonly','true');
    } else {
      $('#cargo_muatan').val();
      $('#cargo_muatan').removeAttr('readonly');
    }
    
  });

  $(document).on('click','#ready', function() {
    var id = $(this).attr('data-id');
    var val = $(this).attr('data-value') == 0 ? '1' : '0';
    $.ajax({
      type: "GET",
      url: "<?php echo base_url('Edit/ready_to_operation/');?>" + id + "/" + val, 
      success: function(response) {
        window.location.reload();
      } 
    });
  });

  $(document).on('click','#edit', function() {
    var id = $(this).attr('data-id');
    $("#modal-body-edit").load("<?= base_url('View/edit/shift_operations/');?>" + id);
    $('#modal-edit').modal('toggle');

  });



</script>