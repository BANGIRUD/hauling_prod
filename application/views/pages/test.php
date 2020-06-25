<style type="text/css">
  
</style>
<div class="content-wrapper"><!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Test Page
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Test Page</li>
    </ol>
  </section>   
  <section class="content"><!-- Main content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus"> Add Unit</i>
            </button>
            <a href="#" class="btn btn-primary">Standby</a>
            <a href="#" class="btn btn-warning">Operation</a>
            <a href="#" class="btn btn-info">All</a>
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
                  <th></th>
                  <th>No</th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Hour Stb</th>
                  <th>Location</th>
                  <th>C/N</th>
                  <th>Posisi (M/K)</th>
                  <th>Cargo Muatan</th>
                  <th>Code Standby</th>
                  <th>Passing</th>
                  <th>Remark</th>
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
                                </a>
                                <a href="#" class="btn btn-xs btn-success" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Ready" data-toggle="tooltip"><i class="fa fa-check"></i>
                                </a>
                              </td>
                              <td>'. $no.'</td>
                              <td>'.$value['date'].'</td>
                              <td>'. date('H:i',strtotime($value['time_in'])).'</td>';
                                $timeout = $value['operation'] == 0 ? '-' : date('H:i',strtotime($value['time_out']));
                                echo '<td>'. $timeout .'</td>';
                                $timestb = $value['operation'] == 0 ? '-' : date('H:i',strtotime(selisih_hour($value['time_in'],$value['time_out'])));
                                echo '<td>'.$timestb.'</td>
                              <td>34</td>
                              <td>'.$value['cn_unit'].'</td>
                              <td>'.$value['position'].'</td>
                              <td>'.$value['cargo'].'</td>
                              <td>'.$value['code_stby'].'</td>
                              <td>'.$value['time_passing'].'</td>
                              <td>'.$value['remark'].'</td>
                              <td>'.$value['csa'].'</td>
                              <td>'.date('H:i',strtotime($value['time'])).'</td>';
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

<div class="modal fade" id="modal-default" tabindex="-1"><!-- Modal Add Unit -->
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?php echo base_url('Save/shift_operation');?>">
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
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="date" value="<?= date('m/d/Y', strtotime($dateid)) ;?>">
                </div>
              </div>  
              <div class="col-xs-4">
                <label>Shift</label>
                 <select class="form-control" name="shift">
                    <?php foreach ($shift as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['name'].'</option>';
                    }
                    ?>
                  </select>
              </div> 
              <div class="col-xs-4">
                <label>Area</label>
                 <select class="form-control" name="area">
                    <?php foreach ($area as $value) {
                      echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                    }
                    ?>
                  </select>
              </div>             
            </div>            
          </div>  
          </div>
          <div class="form-group">
          <div class="form-body">
            <div class="row">
              <div class="col-xs-4">
                <label>ID Unit</label>
                 <input class="form-control" type="text" name="unit" placeholder="Enter Id Unit Here" id="id_unit">
              </div>  
              <div class="col-xs-4">
                <label>Posisi (M/K)</label>
                 <select class="form-control" name="posisi" id="position">
                  <?php foreach ($posisi as $value) {
                    echo'<option value="'.$value['id'].'">'.$value['name'].'</option>';
                  }
                  ?>
                  </select>
              </div> 
              <div class="col-xs-4">
                <label>Cargo Muatan</label>
                 <select class="form-control" name="cargo" id="cargo_muatan">
                    <?php foreach ($material as $value) {
                      echo '<option>'.$value['name'].'</option>';
                    }
                    ?>
                  </select>
              </div>             
            </div>            
          </div>  
          </div>
          <div class="form-group">
          <div class="form-body">
            <div class="row">
              <div class="col-xs-4">
                <label>Date In</label>
                 <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_in" value="<?= date('m/d/Y', strtotime($dateid)) ;?>">
                </div>
              </div>  
              <div class="col-xs-4">
                <label>Time In</label>
                 <div class="input-group">
                    <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time-in"  name="time_in">

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
              <div class="col-xs-4">
                <label>Date Out</label>
                 <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" style="background-color: #e9ecef" class="form-control pull-right datepicker" name="date_out" value="<?= date('m/d/Y', strtotime($dateid)) ;?>">
                </div>
              </div>  
              <div class="col-xs-4">
                <label>Time Out</label>
                 <div class="input-group">
                    <input type="text" style="background-color: #e9ecef" class="form-control timepicker" name="time_out">

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
              <div class="col-xs-4">
                <label>Code Standby</label>
                 <div class="input-group">                  
                    <input type="text" class="form-control" name="code_stby">   
                  </div>
              </div>  
              <div class="col-xs-4">
                <label>Time Passing</label>
                 <div class="input-group">
                    <input type="text" class="form-control timepicker" name="time_passing">

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
              <div class="col-xs-11">
                <label>Remark</label>
                <textarea class="form-control" placeholder="Enter Remark Here" name="remark"></textarea>
              </div>
            </div>
          </div>
          </div>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>   
      </form>      
    </div><!-- /.modal-content -->    
  </div><!-- /.modal-dialog -->
</div><!-- End Modal Add Unit -->

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"><!-- Modal Edit Unit -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Edit/breakdown');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
    $('#modal-edit').modal('toggle');
  });



</script>