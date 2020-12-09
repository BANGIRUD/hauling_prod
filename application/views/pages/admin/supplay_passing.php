<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Supplay Passing Plan
      <small>Shift <?=$shift?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Supplay Passing</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
          <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-supplay-passing">
              <i class="fa fa-upload"> Upload Data</i>
          </button>
        </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">  
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="">
                <thead class="text-center border" style="background-color: #2e86de ; color: #ffffff "> 
                  <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">Raw Material ROM</th>
                    <th style="text-align:center;">ROM</th>
                    <?php
                      for ($a=$hour ,$i=0; $i < 12; $i++, $a++) { 
                        if ($a >= 24) {
                            $a = $a - 24;
                        }
                            $b = $a + 1;
                        if ($b > 24) {
                            $b = ($b - 24);
                        }
                          echo'<th style="text-align:center;">'.$a . ':00' .'</th>';
                      }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 0; 
                  $total = array();
                  foreach ($table as $data) : $no++; $color = explode(',', $data['color']);?>
                  <tr>
                    <td style="text-align:center;"><?= $no;?></td>
                    <td style="text-align:center; background-color: <?=$color[0]?>; color: <?=@$color[1]?>"><?= $data['material'];?></td>
                     <td style="text-align:center;"><?= $data['rom_spp'];?></td>
                      <?php
                        for ($i=1; $i <= 12 ; $i++) { 
                          $total[$i][] = $data['jam_'.$i];
                          echo '<td style="text-align:center;">'.$data['jam_'.$i].'</td>';
                        }
                      ?>              
                  </tr>
                  <?php endforeach;?>
                  <tr style="background-color: #2e86de ; color: #ffffff ; font-weight: bolder">
                    <td colspan="3" style="text-align: center;">Total</td>
                    <?php
                    // print_r($total);
                        for ($i=1; $i <= 12 ; $i++) { 


                          echo '<td style="text-align:center;">'.@array_sum($total[$i]).'</td>';
                        }

                      ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-supplay-passing" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Upload/daily_plan_supplypassing');?>">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Import Data With Excel</h4>
        </div>
        <div class="modal-body">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="file">
              <label class="custom-file-label" for="customFile">Choose file</label>
            <div class="invalid-feedback">Only file .xls (Microsoft Excel 2003). <a href="<?php echo base_url('example_upload_supplay_passing.xls');?>">Download Example</a></div>
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