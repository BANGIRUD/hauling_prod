<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Populasi Unit
      <small>Primemover</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Populasi Unit</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
          <a href="<?php echo base_url("exports/populasi");?>" class="btn btn-success">
              <i class="fa  fa-file-excel-o"> Export to Excel</i>
          </a>
          <button href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#upload-equipment">
            <i class="fa fa-upload"> Upload Data</i>
          </button> 
        </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Populasi Update : <?php echo date('F Y');?></h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="populasi">
                <thead class="text-center border" >
                  <tr nowrap style="text-align: center;">
                    <th style="background-color: #2e86de ; color: #ffffff ">No</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Set Trailer</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">ID Unit</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Model</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Chassis Number</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Brand State</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Product</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Engine Model</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Delivery</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Engine Number</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">KW/HP/RPM</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Type</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Capacity</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Doc. Ellipse</th>
                    <th style="background-color: #2e86de ; color: #ffffff ">Owner Unit</th>
                    <th style="background-color: #e74c3c ; color: #ffffff ">Status Unit</th>
                    <th style="background-color: #e74c3c ; color: #ffffff ">Status To Use</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($table as $value) : $no++;?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $value ['set_trailler'];?>Trailer</td>
                    <td><?= $value ['unit_id'];?></td>
                    <td><?= $value ['model'];?></td>
                    <td><?= $value ['chassis_number'];?></td>
                    <td><?= $value ['brand_state'];?></td>
                    <td><?= $value ['product'];?></td>
                    <td><?= $value ['engine_model'];?></td>
                    <td><?= $value ['delivery'];?></td>
                    <td><?= $value ['engine_number'];?></td>
                    <td><?= $value ['kw_hp_rpm'];?></td>
                    <td><?= $value ['type'];?></td>
                    <td><?= $value ['capacity'];?></td>
                    <td><?= $value ['doc_ellipse'];?></td>
                    <td><?= $value ['owner_unit'];?></td>
                    <td><?= $value ['status_unit'];?></td>
                    <td><?= $value ['status_to_use'];?></td>
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

<div class="modal fade" id="upload-equipment" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/populasi_unit');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('example_upload_populasi_unit.xls');?>">Download Example</a></div>
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
    $('#populasi').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      buttons: [
        'print'
    ]
    })
  });
</script>