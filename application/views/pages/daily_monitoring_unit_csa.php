<div class="content-wrapper"><!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Monitoring Unit CSA<small></small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Monitoring Unit CSA</li>
    </ol>
  </section>
  <section class="content"><!-- Main content -->
    <div class="row">

      <div class="col-md-2-5">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4 style=" font-weight: bolder"><i>UNIT DI DALAM CSA 69</i></h4>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Muatan</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> <?= $total_csa_69['muatan'];?> </label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Kosongan</label> 
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label><?= $total_csa_69['kosongan'];?></label> 
              </div> 
              <div class="col-xs-4" style="text-align: left;">
                <label>Unit</label> 
              </div> 
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr style=" background-color: #2ecc71; color:  #ffffff;">
                    <th>ID</th>
                    <th>CN UNIT</th>
                    <th>MATERIAL</th>
                  </tr>
                  <?php $no=0;foreach ($csa_69->result_array() as $value) :$no++;
                     $color = explode(',', $value['color']);
                  ?>
                  <tr style="text-align: center;">
                    <td><?= $no;?></td>
                    <td><?= $value['cn_unit'];?></td>
                    <?php echo '<td style="background-color:'. $color[0] . ';color:'.@$color[1].'">'. $value['cargo'] . '</td>';?>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2-5">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 style=" font-weight: bolder"><i>UNIT DI DALAM CSA 65</i></h4>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Muatan</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> <?= $total_csa_65['muatan'];?> </label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Kosongan</label> 
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label><?= $total_csa_65['kosongan'];?></label> 
              </div> 
              <div class="col-xs-4" style="text-align: left;">
                <label>Unit</label> 
              </div> 
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr style=" background-color: #3742fa; color:#ffffff;">
                    <th>ID</th>
                    <th>CN UNIT</th>
                    <th>MATERIAL</th>
                  </tr>
                  <?php $no=0;foreach ($csa_65->result_array() as $value) :$no++;$color = explode(',', $value['color']);?>
                  <tr style="text-align: center;">
                    <td><?= $no;?></td>
                    <td><?= $value['cn_unit'];?></td>
                    <?php echo '<td style="background-color:'. $color[0] . ';color:'.@$color[1].'">'. $value['cargo'] . '</td>';?>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2-5">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h4 style=" font-weight: bolder"><i>MUATAN LEWAT KM 65</i></h4>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Total</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> <?= $l_csa_65->num_rows();?> </label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label> &nbsp;</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> &nbsp;</label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>&nbsp;</label>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr style="background-color: #3742fa; color:#ffffff;">
                    <th>ID</th>
                    <th>CN UNIT</th>
                    <th>MATERIAL</th>
                    <th>PASSING</th>
                  </tr>
                  <?php $no=0;foreach ($l_csa_65->result_array() as $value) :$no++;$color = explode(',', $value['color']);?>
                  <tr style="text-align: center;">
                    <td><?= $no;?></td>
                    <td><?= $value['cn_unit'];?></td>
                    <?php echo '<td style="background-color:'. $color[0] . ';color:'.@$color[1].'">'. $value['cargo'] . '</td>';?>
                    <td><?= date('H', strtotime($value['time_passing']));?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2-5">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h4 style=" font-weight: bolder"><i>UNIT DI DALAM CSA 34</i></h4>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Muatan</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> <?= $total_csa_34['muatan'];?> </label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Kosongan</label> 
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label><?= $total_csa_34['kosongan'];?></label> 
              </div> 
              <div class="col-xs-4" style="text-align: left;">
                <label>Unit</label> 
              </div> 
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr style=" background-color: #fdcb6e">
                    <th>ID</th>
                    <th>CN UNIT</th>
                    <th>MATERIAL</th>
                  </tr>
                  <?php $no=0;foreach ($csa_34->result_array() as $value) :$no++;$color = explode(',', $value['color']);?>
                  <tr style="text-align: center;">
                    <td><?= $no;?></td>
                    <td><?= $value['cn_unit'];?></td>
                    <?php echo '<td style="background-color:'. $color[0] . ';color:'.@$color[1].'">'. $value['cargo'] . '</td>';?>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2-5">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h4 style=" font-weight: bolder"><i>MUATAN LEWAT KM 34</i></h4>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label>Total</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> <?= $l_csa_34->num_rows();?> </label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4" style="text-align: right;">
                <label> &nbsp;</label>
              </div>
              <div class="col-xs-4" style="text-align: right;">
                <label> &nbsp;</label>
              </div>
              <div class="col-xs-4" style="text-align: left">
                <label>&nbsp;</label>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr style="background-color: #fdcb6e">
                    <th>ID</th>
                    <th>CN UNIT</th>
                    <th>MATERIAL</th>
                    <th>PASSING</th>
                  </tr>
                  <?php $no=0;foreach ($l_csa_34->result_array() as $value) :$no++;$color = explode(',', $value['color']);?>
                  <tr style="text-align: center;">
                    <td><?= $no;?></td>
                    <td><?= $value['cn_unit'];?></td>
                    <?php echo '<td style="background-color:'. $color[0] . ';color:'.@$color[1].'">'. $value['cargo'] . '</td>';?>
                    <td><?= date('H', strtotime($value['time_passing']));?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.content -->
</div>







  <!-- <div class="col-md-2-5">
        <div class="box box-success">
          <div class="box-header with-border">
            <h4 style=" font-weight: bolder"><i>UNIT DI DALAM CSA 65</i></h4>
            <div class="row">
              <div class="col-xs-6">
                <label>Muatan</label>
              </div>
              <div class="col-xs-6">
                <label>= <?= $total_csa_65['muatan'];?>  Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <label>Kosongan</label> 
              </div>
              <div class="col-xs-6">
                <label>= <?= $total_csa_65['kosongan'];?>  Unit</label> 
              </div> 
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr style="background-color: #3742fa; color:#ffffff;">
                    <th>ID</th>
                    <th>CN UNIT</th>
                    <th>MATERIAL</th>
                  </tr>
                  <?php $no=0;foreach ($csa_65->result_array() as $value) :$no++;?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $value['cn_unit'];?></td>
                    <td><?= $value['cargo'];?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->
