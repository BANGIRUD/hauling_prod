<?php
  $by_area   = $this->session->userdata('area');
  $by_level  = $this->session->userdata('level');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Post Monitoring Muatan
      <small><?=get_enum($by_area)?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Homes</a></li>
      <li class="active">Post Monitoring Muatan <?=get_enum($by_area)?> </li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-6">
              </div>
              <div class="col-xs-6 text-right">
                <a href="<?php echo base_url('dash/daily_monitoring_operations/standby');?>" class="btn btn-primary">&nbsp;</a>
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
                    <th style="text-align: center;">Activity</th>
                  </tr>                  
                </thead>
                <tbody>
                </tbody>  
              </table>
            </div>  
          </div>          
        </div>
      </div>      
    </div>
  </section>
</div>
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
  

</script>