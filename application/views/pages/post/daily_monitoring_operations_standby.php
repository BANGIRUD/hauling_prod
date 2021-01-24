<?php
  $username   = $this->session->userdata('username');
  $name       = $this->session->userdata('name');
  $level      = $this->session->userdata('level');
?>
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Monitoring Pos Standby<small>KM ?</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Monitoring Pos</a></li>
      <li class="active">Standby</li>
    </ol>
  </section>
  <!-- Main content -->   
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-6">
                <!-- <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Unit" id="add-unit">
                  <i class="fa fa-plus"></i> Add Unit Kosongan
                </button> -->
                <button class="btn btn-primary  " data-toggle="modal" id="add-unit">
                  <i class="fa fa-plus"> Add Unit Kosongan</i>
                </button>
              </div>

              <div class="col-xs-6 text-right">
                 <a href="<?php echo base_url('Dash/daily_monitoring_operations_standby/standby');?>" class="btn btn-primary">Standby</a>
                  <a href="<?php echo base_url('Dash/daily_monitoring_operations_standby/l');?>" class="btn btn-warning">Operation</a>
                  <a href="<?php echo base_url('Dash/daily_monitoring_operations_standby/');?>" class="btn btn-info">All</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="col-md-12">
        <?=$this->session->flashdata('msg');?>
        <div class="box">
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr style="background-color: #2e86de ; color: #ffffff ">
                    <th>&nbsp;</th>
                    <th>NO</th>
                    <th>DATE</th>
                    <th>CN UNIT</th>
                    <th>CODE STANDBY</th>                  
                    <th>POSITION</th>
                    <th>CARGO MUATAN</th>
                    <th>REMARK</th>
                    <th>PASSING</th>
                    <th>TIME IN</th>
                    <th>TIME OUT</th>
                    <th>HOUR STB</th>
                    <th>LOC.</th>
                    <th>CSA</th>
                    <th>Time OS</th>
                    <th>Register</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>  
          </div>          
        </div>
      </div>      
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- Modal add Unit -->
<div class="modal fade in" id="modal-addunit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?php echo base_url('Save/save_add_unit');?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Unit Kosongan</h4>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="form-body">
              <div class="row">
                <div class="col-xs-4">
                  <label>ID Unit</label>
                  <input class="form-control" type="text" name="id_unit" id="id_unit" placeholder="Enter Unit ID">
                </div>                
                <div class="col-xs-4">
                  <label>Cargo Muatan</label> 
                  <select class="form-control" name="cargo_muatan" id="cargo_muatan">
                    <?php foreach ($cargo_muatan as $value) {
                      echo '<option value="'.$value['name'].'">'.$value['name'].' </option>';
                    }?>
                  </select>
                </div>
                <div class="col-xs-4">
                  <label>Code Standby</label> 
                  <select class="form-control" name="code_standby" id="code_standby">
                    <?php foreach ($code_standby as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['code'].'</option>';
                    }?>
                  </select> 
                </div>
              </div>
            </div>  
          </div>
          <div class="form-group">
            <div class="form-body">
              <div class="row">
                <div class="col-xs-12">
                  <label>Remark</label>
                  <textarea name="remark" class="form-control" placeholder="Enter Remark Here ..."></textarea>
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
    </div>
  </div>
</div>
<!-- End Modal Add Unit -->
<!-- Modal Edit Unit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
</div>
<!-- End Modal Edit Unit -->
<script type="text/javascript">
$(function () {
  $('#example1').DataTable({
    'paging'      : false,
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

$('#modal-addunit').on('shown.bs.modal', function () {
  $('#id_unit').focus();
});

$(document).on('click', '#add-unit', function(e) {
  var d = new Date();
  var H = (d.getHours() < 10) ? '0' + d.getHours() : d.getHours();
  var m = (d.getMinutes() < 10) ? '0' + d.getMinutes() : d.getMinutes();
  $("#input-time-in").val(H+':'+m);
  $("#input-time-out").val(H+':'+m);
  $("#input-time-passing").val(H);

  $("#modal-addunit").modal('toggle');
});

$('.datepicker').datepicker({
autoclose: true
});

$(document).on('change','#position', function() {
var val = $(this).val();
if(val == "K") {
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
$("#modal-body-edit").load("<?= base_url('view/edit/shift_operations/');?>" + id);
$('#modal-edit').modal('toggle');

});

$(document).on('click', '#delete', function() {
      var ai = $(this).attr('data-id');
      $.ajax({
        type: "POST",
        data:'del=' + ai,
        url: "<?php echo base_url('Delete/add_unit');?>",
        success: function(response) {
          location.reload();
        },
        error: function () {
          console.log("errr");
        }
      });
    });


</script>