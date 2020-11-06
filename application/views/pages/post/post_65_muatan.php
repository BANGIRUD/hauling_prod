<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Post Monitoring Muatan
      <small><?=get_enum($this->session->userdata('area'))?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Homes</a></li>
      <li class="active">Post Monitoring Muatan <?=get_enum($this->session->userdata('area'))?> </li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-6">              
                <button class="btn btn-success  " data-toggle="modal" id="add-unit">
                  <i class="fa fa-plus"> Add Unit Kosongan</i>
                </button>
              </div>
              <div class="col-xs-6 text-right">
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
                <thead style="background-color: #2e86de ; color: #ffffff ; font-size: 12px;">
                  <tr>
                    <th rowspan="2" style="text-align: center;">No</th>
                    <th rowspan="2" style="text-align: center;">CN Unit</th>
                    <th rowspan="2" style="text-align: center;">Cargo Muatan</th>
                    <th rowspan="2" style="text-align: center;">ROM</th>
                    <th rowspan="2" style="text-align: center;">Activity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=0;
                    foreach ($data as $value) {
                    $no++;
                    $color = explode(',', $value['color']);
                    echo '<tr style="text-align: center; font-size: 12px;">';
                      echo '<td>'.$no.'</td>
                            <td>'.$value['cn_unit'].'</td>
                            <td style="background-color:'. $color[0] . ';color:'.@$color[1].'" >'.$value['cargo'].'</td>
                            <td>'.$value['name_rom'].'</td>';
                      echo '<td>
                              <a href="#" class="btn btn-xs btn-success" data-target="#editindata" id="editincsa" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit masuk CSA" data-toggle="tooltip">
                                <i class="fa  fa-reply"> In</i>
                              </a>
                              <a href="#" class="btn btn-xs btn-primary" data-target="#editcontinuedata" id="continue" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit lanjut" data-toggle="tooltip"><i class="fa   fa-fighter-jet"> Pass Through</i>
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
<div class="modal fade in" id="modal-addunit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?php echo base_url('Save/monitoring_operations_65');?>">
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
                  <label>Position</label> 
                  <select class="form-control" name="position" id="position">
                    <?php foreach ($position as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['code'].'</option>';
                    }?>
                  </select> 
                </div>                
                <div class="col-xs-4">
                  <label>Code Standby</label> 
                  <select class="form-control" name="code_standby" id="code_standby">
                    <?php foreach ($code_standby as $value) {
                      echo '<option value="'.$value['code'].'">'.$value['code'] .' | '. $value['name'].'</option>';
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
<!-- Modal Edit Masuk CSA -->
<div class="modal fade in" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Save/monitoring_operations');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="mediumModalLabel">Form In</h4>
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

  $(document).on('click','#editincsa', function() {   
    var id = $(this).attr('data-id');
      $("#modal-body-edit").load("<?= base_url('View/edit/monitoring_operations_65/');?>" + id);
      $('#modal-edit').modal('toggle');
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
  
  $(document).on('click', '#add-unit', function(e) {
    $("#modal-addunit").modal('toggle');
  });

  $('#modal-addunit').on('shown.bs.modal', function () {
    $('#id_unit').focus();
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