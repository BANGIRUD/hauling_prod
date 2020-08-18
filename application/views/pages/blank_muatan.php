<?php
  $by_area   = $this->session->userdata('area');
  $by_level  = $this->session->userdata('level');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Record Production Muatan
      <small><?=get_enum($by_area)?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Record Production <?=get_enum($by_area)?> </li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-6">
                <?php if ($by_level == 'administrator' || $by_level == 'dispatcher'):?>
                  <?php $no=0;    
                    echo '<a class="btn btn-app bg-maroon" href="'.base_url('dash/daily_monitoring_post_muatan/').'"><i class="fa fa-list"></i>ALL</a>';
                    foreach ($area as $value):$no++;
                      if ($value['name'] != 'KM 67' && $value['name'] != 'ROM') {
                        if ($no % 2 == 0) {
                          echo '<a class="btn btn-app bg-olive" href="'.base_url('dash/daily_monitoring_post_muatan/'.$value['id'].'/'.$code).'"><i class="fa fa-inbox"></i>'.$value['name'].'</a>';
                        }else{
                          echo '<a class="btn btn-app bg-orange" href="'.base_url('dash/daily_monitoring_post_muatan/'.$value['id'].'/'.$code).'"><i class="fa fa-inbox"></i>'.$value['name'].'</a>';
                        }
                      }                    
                  ?>
                  <?php endforeach;?>
                <?php endif;?>  
              </div>
              <div class="col-xs-6 text-right">
                <a href="<?php echo base_url('Dash/daily_monitoring_post_muatan/standby');?>" class="btn btn-primary">Standby</a>
                <a href="<?php echo base_url('Dash/daily_monitoring_post_muatan/L');?>" class="btn btn-warning">Operation</a>
                <a href="<?php echo base_url('Dash/daily_monitoring_post_muatan/');?>" class="btn btn-info">All</a>
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
                  <?php 
                    $no = 0;
                    foreach ($data as $value) {
                      $no++; 
                      $color = explode(',', $value['color']);
                      echo '<tr style="text-align: center;">';
                        echo '<td>'.$no.'</td>
                              <td>'.$value['cn_unit'].'</td>
                              <td style="background-color:'. $color[0] . ';color:'.@$color[1].'" >'.$value['cargo'].'</td>';
                        echo '<td nowrap>';
                          echo '<a href="#" class="btn btn-sm btn-success" data-target="#editindata" id="editincsa" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit masuk CSA" data-toggle="tooltip"><i class="fa  fa-reply"> In</i>
                                </a>';

                          echo ' <a href="#" class="btn btn-sm btn-danger" data-target="#editoutdata" id="editoutcsa" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit keluar CSA" data-toggle="tooltip"><i class="fa  fa-share"> Out</i>
                              </a>';
                               echo ' <a href="#" class="btn btn-sm btn-primary" data-target="#editcontinuedata" id="continue" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit lanjut" data-toggle="tooltip"><i class="fa   fa-fighter-jet"> Pass Through</i>
                              </a>';
                        echo '</td>';
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
<!-- Modal Edit Masuk CSA -->
<div class="modal fade in" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Edit/edit_in_csa_muatan');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
  $("#modal-body-edit").load("<?= base_url('View/edit/csa_in_muatan/');?>" + id);
  $('#modal-edit').modal('toggle');
  });

</script>