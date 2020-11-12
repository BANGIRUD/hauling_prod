 <style type="text/css">
  .totodo .tools > i {
    color: #dd4b39;
    cursor: pointer;
    margin-left: 5px
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Raw Material
      <small>Material</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Raw Material</li>
    </ol>
  </section>
  <section class="content">
    <?php if ($this->session->flashdata('msg') != '') {
        echo $this->session->flashdata('msg');
      }
      ?>
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-titile">Data Cargo</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <thead class="text-center border" >
                <tr>
                  <th style="width: 10px">#</th>
                  <th >Cargo Muatan</th>
                  <th style="width: 60px">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($rows as $data) {
                    $color = explode(',', $data['description']);
                    $no++;
                    echo 
                    '<tr class  = totodo>
                       <th >' . $no .'.</th>
                       <td style="background-color:'. $color[0] . ';color:'.@$color[1].'">' . $data['name'] .'</td>
                       <td class="tools">
                        <i class="fa fa-edit" data-toggle="modal" data-target="#modal-cargo" id="editcargo" data-id="' . $data['id'] . '"></i>
                        <i class="fa fa-trash-o" id="delete" data-id="' . $data['id'] . '"></i>
                       </td>
                    </tr>';
                  }
                  ?>
                </tbody> 
              </table>              
              <form role="form" method="POST" action="<?= base_url('Save/cargo_muatan');?>">
                <div class="box-body">
                  <div class="form-group">
                    <label >Cargo Muatan</label>
                    <input type="text" class="form-control"  name="name" placeholder="Code SIS...">
                  </div>
                  <div class="form-group">
                    <label >Color Fill & Text</label>
                    <input type="text" class="form-control" name="description" placeholder="Color (Fill,Text)...">
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-titile">Data ROM</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <thead class="text-center border" >
                <tr>
                  <th style="width: 10px">#</th>
                  <th >Code</th>
                  <th >ROM</th>
                  <th style="width: 60px">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 0;
                    foreach ($roms as $data) {
                      $no++;
                      echo 
                      '<tr class  = totodo>
                         <td >' . $no .'</td>
                         <td >' . $data['code'] .'</td>
                         <td >' . $data['name'] .'</td>
                         <td class="tools">
                          <i class="fa fa-edit" data-toggle="modal" data-target="#modal-rom" id="editrom" data-id="' . $data['id'] . '"></i>
                          <i class="fa fa-trash-o" id="delete" data-id="' . $data['id'] . '"></i>
                         </td>
                      </tr>';
                  }
                  ?>
                </tbody> 
              </table>              
              <form role="form" method="POST" action="<?= base_url('Save/');?>">
                <div class="box-body">
                  <div class="form-group">
                    <label >Code</label>
                    <input type="text" class="form-control"  name="code" placeholder="Enter Code ...">
                  </div>
                  <div class="form-group">
                    <label >ROM</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter ROM ...">
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

<!-- /modal edit cargo -->
<div class="modal fade" id="modal-cargo" style="display: none;" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="form-edit" action="<?= base_url('Edit/cargo_muatan');?>" method="POST">
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
  $(document).on('click', '#editcargo', function(e) {
      var id = $(this).attr('data-id');
      var vPool="";
      $.getJSON('<?php echo base_url('Api/enum');?>/' + id, function(jd) {
        $.each(jd.data, function(i, val){   
          vPool += '<div class="form-group">'+
          '<label>Code SIS</label>'+
          '<input class="form-control" name="id" type="hidden" required autocomplete="off" value="' + this['id'] + '">'+
          '<input class="form-control" name="name" id="name" placeholder="Type here" type="text" required autocomplete="off" value="' + this['name'] + '">'+
          '</div>'+
          '<div class="form-group">'+
          '<label>Color Fill & Text</label>'+
          '<input class="form-control" name="description" id="description" placeholder="Type here" type="text" required autocomplete="off" value="' + this['description'] + '">'+
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
        url: "<?php echo base_url('Delete/enum');?>",
        success: function(response) {
          location.reload();
        },
        error: function () {
          console.log("errr");
        }
      });
    });
</script>