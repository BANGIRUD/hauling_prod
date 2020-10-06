<?php
  $by_rom   = $this->session->userdata('rom');
  $by_level   = $this->session->userdata('level');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Monitoring 
      <small><?=get_enum($by_rom)?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Monitoring <?=get_enum($by_rom)?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <?php if ($this->session->userdata('level') == 'administrator' || $this->session->userdata('level') == 'dispatcher'):?>
               <p style="padding: 0 15px">Click tombol untuk filter ROM:</p>
                <?php $no=0;
                echo '<a class="btn btn-app bg-maroon" href="'.base_url('Dash/daily_rom_operations/').'"><i class="fa fa-list"></i>ALL</a>';
                foreach ($rom as $value):$no++;
                  if ($no % 2 == 0) {
                    echo '<a class="btn btn-app bg-olive" href="'.base_url('Dash/daily_rom_operations/'.$value['id']).'"><i class="fa fa-inbox"></i>'.$value['name'].'</a>';
                  }else{
                    echo '<a class="btn btn-app bg-orange" href="'.base_url('Dash/daily_rom_operations/'.$value['id']).'"><i class="fa fa-inbox"></i>'.$value['name'].'</a>';
                  }
                ?>
                <?php endforeach;?>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
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
                        if($by_level != 'dispatcher'&& $by_level != 'administrator') :
                          $time_in = $value['time_in'];
                          $time_out = $value['time_out'];
                          $btn_in = " disabled";
                          if($time_in == NULL && $time_out == NULL)
                            $btn_in = "";
                          echo '<a href="#" class="btn btn-sm btn-success'.$btn_in.'"  id="edit_in_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit masuk ROM" data-toggle="tooltip"><i class="fa  fa-reply"> In</i>
                                </a>';

                          $btn_out = " disabled";
                          if($time_in != NULL && $time_out == NULL)
                            $btn_out = "";
                          echo ' <a href="#" class="btn btn-sm btn-danger'.$btn_out.'"  id="edit_out_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit keluar ROM" data-toggle="tooltip"><i class="fa  fa-share"> Out</i>  
                              </a>';
                        else :
                          echo '<a href="#" class="btn btn-sm btn-success disabled"  id="edit_in_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit masuk ROM" data-toggle="tooltip"><i class="fa  fa-reply"> In</i>
                                </a>';
                          echo ' <a href="#" class="btn btn-sm btn-danger disabled"  id="edit_out_rom" data-id="'.$value['id'].'" data-original-title="Tekan ini jika unit keluar ROM" data-toggle="tooltip"><i class="fa  fa-share"> Out</i>  
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
        </div>
      </div>      
    </div>
  </section>
</div>
<!-- Modal edit rom -->


<script type="text/javascript">
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
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

  $(document).on('click','#edit_in_rom', function() {
    var id = $(this).attr('data-id');
      $.ajax({
    type: "GET",
    url: "<?php echo base_url('Save/rom_operations/');?>" + id , 
      success: function(response) {
        window.location.reload();
      } 
    });
  });

  $(document).on('click','#edit_out_rom', function() {
    var id = $(this).attr('data-id');
      $.ajax({
    type: "GET",
    url: "<?php echo base_url('Edit/rom_operations/');?>" + id , 
      success: function(response) {
        window.location.reload();
      } 
    });
  });


</script>