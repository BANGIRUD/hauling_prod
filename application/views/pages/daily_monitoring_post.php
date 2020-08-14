<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Monitoring Post
      <small>KM ?</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Monitoring Post KM ?</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-6">
                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Unit" id="add-unit">
                  <i class="fa fa-plus"></i> Add Unit
                </button>
                <a href="" class="btn btn-success">
                  <i class="fa fa-list-ul"> Add Multiple Unit</i>
                </a>
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
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">C/N</th>
                    <th style="text-align: center;">Cargo Muatan</th>                  
                    <th style="text-align: center;">Action</th>
                  </tr>                  
                </thead>
                <tbody></tbody>  
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
      <form action="<?= base_url('Save/');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="mediumModalLabel">Add Unit</h4>
        </div>
        <div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
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
                <label>ROM</label> 
                  <select class="form-control" name="cargo_muatan" id="cargo_muatan">
                    <?php foreach ($cargo_muatan as $value) {
                      echo '<option value="'.$value['name'].'">'.$value['name'].' </option>';
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

<script type="text/javascript">
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

  $('#modal-addunit').on('shown.bs.modal', function () {
  $('#id_unit').focus();
  });
</script>