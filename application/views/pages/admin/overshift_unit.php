<style type="text/css">
  .totodo .tools > i {
    color: #dd4b39;
    cursor: pointer;
    margin-left: 5px
  }
</style>
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
            $result   = get_date_shift();
            $this->db->select('table_shiftos.*,');
            $this->db->from('table_shiftos');
            $this->db->where('table_shiftos.csa = \''.$key['name'].'\'');
            $this->db->where('table_shiftos.deleted_at IS NULL AND table_shiftos.date = \''.$result['date'].'\'');
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
                      <th style="text-align: center; vertical-align: middle;">No</th>
                      <th style="text-align: center; vertical-align: middle;">CN</th>
                      <th style="text-align: center; vertical-align: middle;">Change Shift</th>
                      <th style="text-align: center; vertical-align: middle;">CSA</th>  
                      <th style="text-align: center; vertical-align: middle;">&nbsp;</th>  
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 0;
                      foreach ($table as $value) {
                      $no++;
                        echo '<tr  style="text-align: center; vertical-align: middle;"  class  = totodo>
                                <td>'.$no.'</td>
                                <td>'.$value['no_id'].'</td>
                                <td>'.$value['time'].'</td>
                                <td>'.$value['csa'].'  </td>';
                          echo '<td class="tools" style="text-align: center;">
                                  <i class="fa fa-edit" data-toggle="modal" data-target="#modal-csa" id="editcsa" data-id="' . $value['id'] . '"></i>
                                  <i class="fa fa-trash-o" id="delete" data-id="' . $value['id'] . '"></i>
                                </td>';
                        echo  '</tr>';
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

<div class="modal fade" id="modal-csa" style="display: none;" tabindex="-1">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <form id="form-edit" action="<?= base_url('Edit/');?>" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Form Edit</h4>
        </div>
        <div class="modal-body" id="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="submit">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).on('click', '#editcsa', function(e) {
      var id = $(this).attr('data-id');
      var vPool="";
      $.getJSON('<?php echo base_url('Api/shiftos');?>/' + id, function(jd) {
        $.each(jd.data, function(i, val){   
          vPool += 
          '<div class="form-group">'+
            '<div class="form-body">'+
              '<div class ="row">'+
                '<div class ="col-xs-4">'+
                  '<label>CN</label>'+
                  '<input class="form-control" name="id" type="hidden" required autocomplete="off" value="' + this['id'] + '">'+
                  '<input class="form-control" name="no_id" id="no_id" placeholder="Type here" type="text" required autocomplete="off" value="' + this['no_id'] + '">'+
                '</div>'+
                '<div class ="col-xs-4">'+
                  '<label>Change Shift</label>'+
                  '<input class="form-control" name="time" id="time" placeholder="Type here" type="text" required autocomplete="off" value="' + this['time'] + '">'+
                '</div>'+
                '<div class ="col-xs-4">'+
                  '<label>CSA</label>'+
                  '<input class="form-control" name="csa" id="csa" placeholder="Type here" type="text" required autocomplete="off" value="' + this['csa'] + '">'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>'
          ;
        });
        $('#modal-body').html(vPool);
      });
  });

  $(document).on('click', '#delete', function() {
      var ai = $(this).attr('data-id');
      $.ajax({
        type: "POST",
        data:'del=' + ai,
        url: "<?php echo base_url('Delete/shiftos');?>",
        success: function(response) {
          location.reload();
        },
        error: function () {
          console.log("errr");
        }
      });
  });
</script>

