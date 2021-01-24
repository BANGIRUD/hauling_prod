<?php
  $by_area   = $this->session->userdata('area');
  $by_level  = $this->session->userdata('level');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Post
      <small><?=get_enum($by_area)?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Post <?=get_enum($by_area)?> </li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">       
      <?=$this->session->flashdata('msg');?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-6">
              <?php if($by_level != 'dispatcher'&& $by_level != 'administrator') :?>
                <button class="btn btn-success  " data-toggle="modal" id="add-unit">
                  <i class="fa fa-plus"> Add Unit</i>
                </button>
              <?php else:?>
                <button class="btn btn-success  disabled" data-toggle="modal">
                  <i class="fa fa-plus"> Add Unit</i>
                </button>
              <?php endif;?>
              </div> 
              <div class="col-xs-6 text-right">
                <a href="<?php echo base_url('Dash/post_69/standby');?>" class="btn btn-primary">Standby</a>
                <a href="<?php echo base_url('Dash/post_69/l');?>" class="btn btn-warning">Operation</a>
                <a href="<?php echo base_url('Dash/post_69/');?>" class="btn btn-danger">All</a>
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
                <thead style="background-color: #2e86de ; color: #ffffff ; font-size: 12px;">
                  <tr>
                    <th rowspan="2" style="text-align: center;">&nbsp;</th>
                    <th rowspan="2" style="text-align: center;">No</th>
                    <th rowspan="2" style="text-align: center;">Date</th>
                    <th colspan="3" style="text-align: center;">Time</th>
                    <th rowspan="2" style="text-align: center;">CN Unit</th>                  
                    <th rowspan="2" style="text-align: center;">Position</th>
                    <th rowspan="2" style="text-align: center;">Cargo Muatan</th>
                    <th rowspan="2" style="text-align: center;">Code Standby</th>
                    <th rowspan="2" style="text-align: center;">Remarks</th>
                    <th rowspan="2" style="text-align: center;">CSA</th>
                    <th rowspan="2" style="text-align: center;">Time OS</th>
                    <th rowspan="2" style="text-align: center;">Register</th>
                    <th rowspan="2" style="text-align: center;">Action</th>
                  </tr>
                  <tr>
                    <th style="text-align: center;">In</th>
                    <th style="text-align: center;">Out</th>
                    <th style="text-align: center;">Hour Stb</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0;
                    // print_r($data);
                    foreach ($data as $value) {
                      $no++;
                      $color = explode(',', $value['color']);
                      echo '<tr style="text-align: center; font-size: 12px;" if>';
                        if($by_level != 'dispatcher'&& $by_level != 'administrator') :
                        echo '<td>
                                <a href="#" class="btn btn-xs btn-primary" data-target="#editdata" id="edit" data-id="'.$value['id'].'" data-original-title="Edit" data-toggle="tooltip">
                                  <i class="fa fa-edit"></i>
                                </a> ';
                          if($value['operation'] == 0 && strtolower($value['code_stby']) != 'l') : 
                          echo '<a href="#" class="btn btn-xs btn-success" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'"data-original-title="Ready" data-toggle="tooltip"><i class="fa fa-check"></i>
                                </a>';
                          else: 
                          echo '<a href="#" class="btn btn-xs btn-danger" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Cancel" data-toggle="tooltip"><i class="fa fa-remove"></i>
                                </a>';
                          endif;   
                        echo '</td>';
                        else:
                          echo '<td>
                                <a href="#" class="btn btn-xs btn-primary disabled" data-target="#editdata" id="edit" data-id="'.$value['id'].'" data-original-title="Edit" data-toggle="tooltip">
                                  <i class="fa fa-edit"></i>
                                </a> ';
                          if($value['operation'] == 0 && strtolower($value['code_stby']) != 'l') : 
                          echo '<a href="#" class="btn btn-xs btn-success disabled" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'"data-original-title="Ready" data-toggle="tooltip"><i class="fa fa-check"></i>
                                </a>';
                          else: 
                          echo '<a href="#" class="btn btn-xs btn-danger disabled" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Cancel" data-toggle="tooltip"><i class="fa fa-remove"></i>
                                </a>';
                          endif;   
                        echo '</td>';
                        endif;
                        echo '<td>'.$no.'</td>
                              <td>'.date('Y-m-d',strtotime($value['time_in'])).'</td>
                              <td>'.date('H:i',strtotime($value['time_in'])).'</td>';
                              if (strtolower($value['code_stby']) == 'l') {
                                      $timeout = date('H:i',strtotime($value['time_out']));
                                    } else {
                                      $timeout = $value['operation'] == 0 ? '-' : date('H:i',strtotime($value['time_out']));
                                    }
                        echo '<td>'.$timeout.'</td>';
                               $timestb = $value['operation'] == 0 ? '-' : date('H:i',strtotime(selisih_hour($value['time_in'],$value['time_out'])));
                        echo '<td>'.$timestb.'</td>
                              <td>'.$value['cn_unit'].'</td>
                              <td>'.$value['position'].'</td>';
                      if ($value['cargo_awal'] == "Kosongan") {
                        echo '<td>'.$value['cargo_awal'].'</td>';
                      }else{
                        echo '<td style="background-color:'. $color[0] . ';color:'.@$color[1].'" >'.$value['cargo_awal'].'</td>';
                      }                           
                               // $timepassing = $value['operation'] == 0 ? '-' : date('H',strtotime($value['time_passing']));
                        echo  '<td>'.$value['code_stby'].'</td>
                              <td>'.$value['remark'].'</td>
                              <td>'.$value['csa'].'</td>
                              <td>'.$value['time'].'</td>
                              <td style="text-align: center; background-color: '. colors_setting_unit(strtolower($value['register']))['bg'] .'; color: '. colors_setting_unit(strtolower($value['register']))['color'].'">'.$value['register'].'</td>';
                        echo '<td>';
                          if($by_level != 'dispatcher'&& $by_level != 'administrator') :
                          echo' <a href="#" class="btn btn-xs btn-danger" data-target="#deletedata" id="delete" data-id="'.$value['id'].'" data-original-title="delete" data-toggle="tooltip">
                                  <i class="fa fa-trash"></i>
                                </a>                                          
                              </td>';
                          else:
                          echo' <a href="#" class="btn btn-xs btn-danger disabled" data-target="#deletedata" id="delete" data-id="'.$value['id'].'" data-original-title="delete" data-toggle="tooltip">
                                  <i class="fa fa-trash"></i>
                                </a>                                          
                              </td>';
                          endif;  
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
<!-- Modal Masuk CSA 69-->
<div class="modal fade in" id="modal-addunit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Save/monitoring_operations_69');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="mediumModalLabel">Input Data</h4>
        </div>
        <div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-4">
                <label>ID Unit</label> 
                <input class="form-control" type="text" name="id_unit" id="id_unit" placeholder="Enter Unit ID">
              </div>
              <div class="col-xs-4">
                <label>Position</label> 
                  <select class="form-control" name="position">
                    <?php foreach ($position as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['name'].' </option>';
                    }?>
                  </select>
              </div>
              <div class="col-xs-4">
                <label>Code Standby</label> 
                  <select class="form-control" name="code_standby" id="code_standby">
                    <?php foreach ($code_standby as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['code']. ' | ' .$value['name'].' </option>';
                    }?>
                  </select>                 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-12">
                <label>Remarks</label> 
                <textarea name="remark" class="form-control" placeholder="Enter Remarks Here ..."></textarea>
              </div>
            </div>
          </div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Unit -->
<div class="modal fade " id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Edit/pos_69');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
  socket.emit('request_record_rom');

  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
        buttons: [
      'print'
        ]
    })
  });

  $(document).on('click','#edit', function() {
  var id = $(this).attr('data-id');
    $("#modal-body-edit").load("<?= base_url('view/edit/monitoring_operations_69/');?>" + id);
    $('#modal-edit').modal('toggle');
  });

  $(document).on('click', '#add-unit', function(e) {
    $("#modal-addunit").modal('toggle');
  }); 

  $('#modal-addunit').on('shown.bs.modal', function () {
    $('#id_unit').focus();
  });

  $(document).on('click','#ready', function() {
  var id = $(this).attr('data-id');
  var val = $(this).attr('data-value') == 0 ? '1' : '0';
    $.ajax({
      type: "GET",
      url: "<?php echo base_url('Edit/ready_to_operation_69/');?>" + id + "/" + val, 
      success: function(response) {
      window.location.reload();
      } 
    });
  });

  $(document).on('click', '#delete', function() {
    var ai = $(this).attr('data-id');
      $.ajax({
        type: "POST",
        data:'del=' + ai,
        url: "<?php echo base_url('Delete/post_69');?>",
        success: function(response) {
          location.reload();
        },
        error: function () {
          console.log("errr");
        }
      });
  });
  
</script>



<!-- <a href="" class="btn btn-xs btn-warning" id="up" data-id="" data-column="cancel" data-text=" " data-original-title="Up" data-toggle="tooltip">
<i class="fa fa-arrow-up"></i>
</a> 
<a href="" class="btn btn-xs btn-warning" id="down" data-id="" data-column="cancel" data-text=" " data-original-title="Down" data-toggle="tooltip">
<i class="fa fa-arrow-down"></i>
</a> -->


<!-- <a href="" class="btn btn-xs btn-warning disabled" id="up" data-id="" data-column="cancel" data-text=" " data-original-title="Up" data-toggle="tooltip">
<i class="fa fa-arrow-up"></i>
</a> 
<a href="" class="btn btn-xs btn-warning disabled" id="down" data-id="" data-column="cancel" data-text=" " data-original-title="Down" data-toggle="tooltip">
<i class="fa fa-arrow-down"></i>
</a> -->