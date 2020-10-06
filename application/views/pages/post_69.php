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
              <div class="col-xs-12">
                <button class="btn btn-primary  " data-toggle="modal" id="add-unit">
                  <i class="fa fa-plus"> Add Unit</i>
                </button>
              </div>  
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Kosongan</a></li>
                <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Muatan</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="kosongan_69">
                      <thead style="background-color: #3742fa; color: #ffffff;">
                        <tr>
                          <th>No</th>
                          <th>C/N</th>
                          <th>Position</th>
                          <th>Code Standby</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 0;
                          foreach ($data as $value) {
                            $no++;
                            echo '<tr style="text-align: center;">';
                              echo '<td>'.$no.'</td>
                                   <td>'.$value['cn_unit'].'</td>
                                   <td>'.$value['position'].'</td>
                                   <td>'.$value['code_stby'].'</td>';
                              echo '<td nowrap>';
                              $btn_disabled = $no == 1 ? ' disabled' : '';
                                echo '<a href="'.base_url('edit/edit_shift_operation_ordered/'.$value['id'].'/'.$no.'/top').'" class="btn btn-xs btn-warning '.$btn_disabled.'" id="up" data-id="" data-column="cancel" data-text=" " title="Up"><i class="fa fa-arrow-up"></i></a> ';
                                echo '<a href="'.base_url('edit/edit_shift_operation_ordered/'.$value['id'].'/'.$no.'/down').'" class="btn btn-xs btn-warning" id="down" data-id="" data-column="cancel" data-text=" " title="Down"><i class="fa fa-arrow-down"></i></a>';
                                if($value['operation'] == 0 && strtolower($value['code_stby']) != 'l') : 
                                echo ' <a href="#" class="btn btn-xs btn-success" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Ready" data-toggle="tooltip"><i class="fa fa-check"></i>
                                  </a>';
                                else:
                                echo ' <a href="#" class="btn btn-xs btn-danger" id="ready" data-id="'.$value['id'].'" data-value="'.$value['operation'].'" data-original-title="Cancel" data-toggle="tooltip"><i class="fa fa-remove"></i>
                                  </a>';
                                endif;
                              echo '</td>';
                            echo '</tr>';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="tab_2">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="kosongan_69">
                      <thead style="background-color: #3742fa; color: #ffffff;">
                        <tr>
                          <th>No</th>
                          <th>C/N</th>
                          <th>Code Standby</th>
                          <th>Cargo Muatan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="text-align: center;">
                          <td>1</td>
                          <td>100</td>
                          <td>S01</td>
                          <td>HAV ASG</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Modal Edit Masuk CSA 69-->
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
                <label>Cargo Muatan</label> 
                  <select class="form-control" name="code_standby" id="code_standby">
                    <?php foreach ($code_standby as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['code'].' </option>';
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


<script type="text/javascript">
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

  $('#modal-addunit').on('shown.bs.modal', function () {
    $('#id_unit').focus();
  });

  $(document).on('click', '#add-unit', function(e) {
    $("#modal-addunit").modal('toggle');
  }); 

  $(document).on('click','#editincsa', function() {   
  var id = $(this).attr('data-id');
  $("#modal-body-edit").load("<?= base_url('View/edit/monitoring_operations/');?>" + id);
  $('#modal-edit').modal('toggle');
  });

  $(document).on('click','#editoutcsa', function() {
    var id = $(this).attr('data-id');
      $.ajax({
      type: "GET",
      url: "<?php echo base_url('Edit/monitoring_operations/');?>" + id , 
        success: function(response) {
          window.location.reload();
        } 
      });
  });

  $(document).on('click','#continue', function() {
    var id = $(this).attr('data-id');
      $.ajax({
    type: "GET",
    url: "<?php echo base_url('Edit/bypass_monitoring_operations/');?>" + id , 
      success: function(response) {
        window.location.reload();
      } 
    });
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

</script>