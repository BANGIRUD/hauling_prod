<style type="text/css">
  .table-striped tbody tr {
background-color: #ecf0f1;
}
.table-striped tbody tr:nth-of-type(2n+1) {
background-color: #ecf0f1;
}
</style>t

<div class="content-wrapper"><!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Setting<small>Unit daily</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Setting unit</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-setting-daily">
              <i class="fa fa-upload"> Upload Data</i>
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="table-reponsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: #3c8dbc;color: #ffffff ">
                  <tr>
                    <!-- <th width="10" style="text-align: center">&nbsp;</th> -->
                    <th width="50" style="text-align: center">No</th>
                    <th width="100" style="text-align: center">Code Number</th>
                    <th width="100" style="text-align: center">Unit ID</th>
                    <th width="100" style="text-align: center">No Unit</th>
                    <th width="100" style="text-align: center">Status</th>
                    <th style="text-align: center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; foreach ($table as $data) : $no++;?>
                  <tr>
                    <!-- <td nowrap><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" id="edit" data-unit="<?= $data['no_unit'];?>" data-ellipse="<?= $data['set_trailler'];?>" data-register="<?= $data['register'];?>" title="Edit data"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" id="delete" data-id="<?= $data['id'];?>" title="Delete data"><i class="fa fa-trash"></i></a></td> -->
                    <td nowrap style="text-align: center"><?= $no;?></td>
                    <td nowrap style="text-align: center"><?= $data['set_trailler'];?></td>
                    <td nowrap style="text-align: center"><?= $data['unit_id'];?></td>
                    <td nowrap style="text-align: center"><?= $data['no_unit'];?></td>
                    <td nowrap="nowrap" style="text-align: center; background-color: <?= colors_setting_unit(strtolower($data['register']))['bg'];?>; color: <?= colors_setting_unit(strtolower($data['register']))['color'];?>"><?= $data['register'];?></td>
                    <td nowrap style="text-align: center"><?= $data['remark'];?></td>
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

<div class="modal fade" id="modal-setting-daily" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/setting_unit_operasi');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('example_upload_setting_operations_new.xls');?>">Download Example</a></div>
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
  })
</script>