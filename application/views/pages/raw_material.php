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
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
          <!-- <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-supplay-passing">
              <i class="fa fa-upload"> Upload Data</i>
          </button> -->
        </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-body">  
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="">
                <thead class="text-center border" style="background-color: #2e86de ; color: #ffffff ">
                  <tr >
                    <th>#</th>
                    <th>Cargo Muatan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  $sql = $this->Crud->search('table_enum', array('table_enum.type' => 'cargo_muatan', 'deleted_at' => NULL))->result_array();
                  foreach ($sql as $data) {
                    $color = explode(',', $data['description']);
                    $no++;
                    echo 
                    '<tr class  = totodo>
                       <td>' . $no .'</td>
                       <td style="background-color:'. $color[0] . ';color:'.@$color[1].'">' . $data['name'] .'</td>
                       <td class="tools">
                        <i class="fa fa-edit" data-toggle="modal" data-target="#modal-default" id="edit" data-id="' . $data['id'] . '"></i>
                        <i class="fa fa-trash-o" id="delete" data-id="' . $data['id'] . '"></i>
                       </td>
                    </tr>';
                  }
                  ?>
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-5">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Code</h3>
            </div>
            <form role="form" method="POST" action="<?= base_url('Save/code_material');?>">
              <div class="box-body">
                <div class="form-group">
                  <label >Cargo Muatan</label>
                  <input type="text" class="form-control"  name="name" placeholder="Material SIS...">
                </div>
                <div class="form-group">
                  <label >Color Fill & Text</label>
                  <input type="text" class="form-control" name="category_description" placeholder="Color (Fill,Text)...">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>

          </div>
    </div>
  </section>
</div>


<!-- /modal edit -->
        <div class="modal fade" id="modal-default" style="display: none;" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="form-edit" action="<?= base_url('Edit/raw_material');?>" method="POST">
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
            <!-- /.modal-content -->
          </div>

<script type="text/javascript">
  $(document).on('click', '#edit', function(e) {
      var id = $(this).attr('data-id');
      var vPool="";
      $.getJSON('<?php echo base_url('Api/enum');?>/' + id, function(jd) {
        $.each(jd.data, function(i, val){   
          vPool += '<div class="form-group">'+
          '<label>Code SIS</label>'+
          '<input class="form-control" name="name" id="name" placeholder="Type here" type="text" required autocomplete="off" value="' + this['name'] + '">'+
          '</div>'+
          '<div class="form-group">'+
          '<label>Color Fill & Text</label>'+
          '<input class="form-control" name="category_description" id="category_description" placeholder="Type here" type="text" required autocomplete="off" value="' + this['category_description'] + '">'+
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