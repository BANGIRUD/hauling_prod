<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Quality
      <small>Database</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Database Quality</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
          <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus"> Add Kode</i>
          <button href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-upload">
            <i class="fa fa-upload"> Upload Data</i>
          </button>
          </button>  
        </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Update : <?php echo date('d-F-Y');?></h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="populasi">
                <thead class="text-center border" style="background-color: #2e86de ; color: #ffffff ">
                  <tr>
                    <th width="5">#</th>
                    <th width="45">Raw Material</th>
                    <th width="10">TM</th>
                    <th width="10">TS</th>
                    <th width="10">ASH</th>
                    <th width="10">IM</th>
                    <th width="10">Cal (ar)</th>
                    <th width="10">HGI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; foreach ($table as $data) : $no++;?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $data['series'];?></td>
                    <td><?= $data['tm'];?></td>
                    <td><?= $data['ts_ar'];?></td>
                    <td><?= $data['ash_ar'];?></td>
                    <td><?= $data['im'];?></td>
                     <td><?= $data['cv_ar'];?></td>
                      <td><?= $data['hgi'];?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-add" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" tabindex="-1"><!-- Modal Edit Unit -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Save/quality');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="mediumModalLabel">Add Data Quality</h4>
        </div>
        <div class="modal-body ">
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-3">
                <label>Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker"  name="date" value="<?= date('m/d/Y');?>" placeholder="Enter Date Here ...">
                </div>
              </div>
              <div class="col-xs-3">
                <label>Series / Raw Material</label>
                  <select class="form-control select" name="series" id="series">
                          <?php foreach ($material_new as $value) {
                            echo '<option >'.$value['name'].' </option>';
                          }
                          ?>
                  </select>                  
              </div>
              <div class="col-xs-3">
                <label>TM</label>
                <input class="form-control" type="text" name="tm" id="tm" placeholder="Enter Mining Here ...">
              </div>
              <div class="col-xs-3">
                <label>IM</label>
                <input class="form-control" type="text" name="im" id="im" placeholder="Enter Hauling Here ...">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-body">
              <div class="col-xs-3">
                <label>ASH AR</label>
                <input class="form-control" type="text" name="ash_ar" id="ash_ar" placeholder="Enter TM Here ...">
              </div>
              <div class="col-xs-3">
                <label>TS AR</label>
                <input class="form-control" type="text" name="ts_ar" id="ts_ar" placeholder="Enter TS AR Here ...">
              </div>
              <div class="col-xs-3">
                <label>CV AR</label>
                <input class="form-control" type="text" name="cv_ar" id="cv_ar" placeholder="Enter CV AR Here ...">
              </div>
              <div class="col-xs-3">
                <label>HGI</label>
                <input class="form-control" type="text" name="hgi" id="hgi" placeholder="Enter HGI Here ...">
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

<div class="modal fade" id="modal-upload" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/quality');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('example_upload_quality_material.xls');?>">Download Example</a></div>
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
  $('.datepicker').datepicker({
      autoclose: true
  });

  $('#modal-add').on('shown.bs.modal', function () {
    $('#tm').focus();
  });

</script>