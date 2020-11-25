<?php
  $by_area   = $this->session->userdata('area');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Record Production
      <small><?=get_enum($by_area)?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Record Production <?=get_enum($by_area)?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-12">
                <button class="btn btn-primary  " data-toggle="modal" id="add-unit">
                  <i class="fa fa-plus"> Add Unit</i>
                </button>
                <a href="<?php echo base_url('Dash/multiple_record_production');?>" class="btn btn-success">
                  <i class="fa fa-list-ul"> Add Multiple Unit</i>
                </a>
                <!-- <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Unit" id="add-unit">
                  <i class="fa fa-plus"></i> Add Unit
                </button> -->
                <!-- <button href="#" class="btn btn-primary  " data-toggle="modal" data-target="#upload-addunit">
                  <i class="fa fa-upload"> Upload Add Unit</i>
                </button> 
                <button href="#" class="btn btn-warning pull-right" data-toggle="modal" data-target="#upload-validateunit">
                  <i class="fa fa-upload"> Upload Validate Unit</i>
                </button>  -->
              </div>  
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
      <?=$this->session->flashdata('msg');?>
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
                    <th style="text-align: center;">Datetime</th>
                    <th style="text-align: center;">&nbsp;</th>
                  </tr>                  
                </thead>
                <tbody>
                  <?php
                    $no = 0;
                    foreach ($data as $value) {
                      $no++; 
                      $color = explode(',', $value['color']);
                        echo '<tr style="text-align: center;">';                  
                        echo '
                              <td>'.$no.'</td>
                              <td>'.$value['cn_unit'].'</td>
                              <td style="background-color:'. $color[0] . ';color:'.@$color[1].'" >'.$value['cargo'].'</td>  
                              <td>'.$value['rom_name'].'</td>
                              <td>'. date('Y-m-d H:i',strtotime($value['time'])).'</td>';
                        // echo '<td nowrap>';

                        // $btn_disabled = $no == 1 ? ' disabled' : '';
                        // echo '<a href="'.base_url('edit/edit_shift_operation_ordered/'.$value['id'].'/'.$no.'/top').'" class="btn btn-xs btn-warning '.$btn_disabled.'" id="up" data-id="" data-column="cancel" data-text=" " title="Up"><i class="fa  fa-arrow-up"></i>
                        //       </a> ';

                        // echo '<a href="'.base_url('edit/edit_shift_operation_ordered/'.$value['id'].'/'.$no.'/down').'" class="btn btn-xs btn-warning" id="down" data-id="" data-column="cancel" data-text=" " title="Down"><i class="fa  fa-arrow-down"></i>
                        //       </a>';
                        // echo '</td>';                            
                        echo '<td nowrap class="text-center">
                                <a href="#" class="btn btn-xs btn-primary" data-target="#editdata" id="edit" data-id="'.$value['id'].'" data-original-title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-danger" data-target="#deletedata" id="delete" data-id="'.$value['id'].'" data-original-title="delete" data-toggle="tooltip"><i class="fa fa-trash"></i>
                                </a>
                              </td>'; 

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
<!-- Modal add Unit -->
<div class="modal fade" id="modal-addunit" role="dialog"  aria-hidden="true" tabindex="-1"><!-- Modal Edit Unit -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Save/shift_operation');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="mediumModalLabel">Add Unit</h4>
        </div>
        <div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-3">
                <label>Time</label> 
                  <div class="input-group">
                    <input type="text" style="background-color: #e9ecef" class="form-control timepicker" id="input-time"  name="time" value="">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                  </div>
              </div>
              <div class="col-xs-3">
                <label>ID Unit</label> 
                <input class="form-control" type="text" name="id_unit" id="id_unit" placeholder="Enter Unit ID">
              </div>
              <div class="col-xs-3">
                <label>Cargo Muatan</label> 
                  <select class="form-control" name="cargo_muatan" id="cargo_muatan">
                    <?php foreach ($cargo_muatan as $value) {
                      echo '<option value="'.$value['name'].'">'.$value['name'].' </option>';
                    }?>
                  </select>                 
              </div>
              <div class="col-xs-3">
                <label>ROM</label> 
                  <select class="form-control" name="rom">
                    <?php foreach ($rom as $value) {
                      echo '<option value="'.$value['id'].'">'.$value['name'].' </option>';
                    }?>
                  </select>
              </div>
            </div>
          </div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Edit/shift_operation');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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

<div class="modal fade" id="upload-addunit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('example_upload_add_unit.xls');?>">Download Example</a></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="adds">Import Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="upload-validateunit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('.xls');?>">Download Example</a></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="adds">Import Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  socket.emit('request_record_rom');

  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
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

  $(document).on('click', '#add-unit', function(e) {
    var d = new Date();
    var H = (d.getHours() < 10) ? '0' + d.getHours() : d.getHours();
    var m = (d.getMinutes() < 10) ? '0' + d.getMinutes() : d.getMinutes();
      $("#input-time").val(H+':'+m);
      $("#modal-addunit").modal('toggle');
  }); 

  $('.datepicker').datepicker({
    autoclose: true
  });

  $('#modal-addunit').on('shown.bs.modal', function () {
    $('#id_unit').focus();
  });

  $(document).on('click','#edit', function() {
    var id = $(this).attr('data-id');
      $("#modal-body-edit").load("<?= base_url('View/edit/shift_operations/');?>" + id);
      $('#modal-edit').modal('toggle');
  });

  $(document).on('click', '#delete', function() {
    var ai = $(this).attr('data-id');
      $.ajax({
        type: "POST",
        data:'del=' + ai,
        url: "<?php echo base_url('Delete/shift_operations');?>",
        success: function(response) {
          location.reload();
        },
        error: function () {
          console.log("errr");
        }
      });
  });
</script>