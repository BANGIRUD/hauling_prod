<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Plan
        <small>Unit overshift</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <button href="#" class="btn btn-success" data-toggle="modal" data-target="#upload-overshift">
                <i class="fa fa-upload"> Upload Data</i>
              </button>  
            </div>
          </div>
        </div>
        <?php foreach ($csa as $key ) :
            $this->db->select('table_shiftos.*,');
            $this->db->from('table_shiftos');
            $this->db->where('table_shiftos.csa = \''.$key['name'].'\'');
            $table = $this->db->get()->result_array();
        ?>
        <div class="col-md-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Plan <?=$key['name'];?></h3>  
            </div>
              <div class="box-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr style="background-color: #2e86de ; color: #ffffff ">
                      <th>No</th>
                      <th>CN</th>
                      <th>Change Shift</th>
                      <th>CSA</th>  
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 0;
                      foreach ($table as $value) {
                      $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$value['no_id'].'</td>
                                <td>'.$value['time'].'</td>
                                <td>'.$value['csa'].'  </td>
                              </tr>';
                      }
                    
                    ?>
                  </tbody>    
                </table>
                </div>  
              </div>
          </div>
        </div>
      <?php endforeach;?>
      </div>    
    </section>
</div>

<div class="modal fade" id="upload-overshift" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/daily_overshift_unit');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('example_upload_overshift_unit.xls');?>">Download Example</a></div>
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

