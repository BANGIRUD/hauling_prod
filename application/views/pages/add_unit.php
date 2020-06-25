<style type="text/css">
  .select2-container .select2-selection--single {
    height: auto;
  }
  .select2-container {
    max-width: 150px;
  }
</style>
<div class="content-wrapper"> 
  <section class="content-header">
    <h1>
      Add
      <small>Unit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Unit</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <a href="<?php echo base_url('Dash/shift_operations');?>" class="btn btn-primary">
              <i class="fa fa-reply">  Kembali</i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-12">
       <div class="box">
          <div class="box-body">
             <form method="POST" action="<?php echo base_url('Save/bulk_shift_operation');?>">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="shiftOperation">
                  <thead class="text-center border" style="background-color: #2e86de ; color: #ffffff "> 
                    <tr>
                      <th>C/N</th>
                      <th>Posisi (M/K)</th>
                      <th>Cargo Muatan</th>
                      <th>Code Standby</th>
                      <th>Remark</th>
                      <th></th>
                    </tr>

                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" name="cn[]" class="form-control" value="" placeholder="Enter Id Unit Here..." required  autofocus></td>
                      <td>
                        <select class="form-control" name="posisi[]" id="position">
                        <?php foreach ($posisi as $value) {
                          echo'<option value="'.$value['id'].'">'.$value['name'].'</option>';
                        }
                        ?>
                        </select>
                      </td>
                      <td>
                        <select class="form-control" name="cargo[]" id="cargo_muatan">
                          <?php foreach ($material as $value) {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                          }
                          ?>
                        </select>
                      </td>
                      <td>
                        <select class="form-control select2" name="code_stby[]" id="code_stby">
                          <?php foreach ($standby as $value) {
                            echo '<option value="'.$value['id'].'">'.$value['code'].'</option>';
                          }
                          ?>
                        </select>
                      </td>
                      <td><input type="text" name="remark[]" class="form-control" value="" placeholder="Enter Remark Here..."></td>
                      <td><button type="button" class="btn btn-primary" id="add"><i class="fa fa-plus"></i></button></td>
                    </tr>
                  </tbody>
                  </table>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Semua</button>
             </form>
          </div>
        </div> 
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  function append() {
    $('#shiftOperation').append('<tr>' +
        '<td><input type="text" name="cn[]" class="form-control" value="" required  autofocus placeholder="Enter Id Unit Here..."></td>' +
        '<td>' +
          '<select class="form-control" name="posisi[]" id="position">' +
          <?php foreach ($posisi as $value) {
            echo'\'<option value="'.$value['id'].'">'.$value['name'].'</option>\' + ';
          }
          ?>
          '</select>' +
        '</td>' +
        '<td>' +
          '<select class="form-control" name="cargo[]" id="cargo_muatan">' +
            <?php foreach ($material as $value) {
              echo '\'<option value="'.$value['id'].'"> '.$value['name'].' </option>\' +';
            }
            ?>
          '</select>' +
        '</td>' +
        '<td>' +
          '<select class="form-control select2" name="code_stby[]" id="code_stby">' +
            <?php foreach ($standby as $value) {
              echo '\'<option value="'.$value['id'].'">'.$value['code'].'</option>\' +';
            }
            ?>
          '</select>' +
        '</td>' +
        '<td><input type="text" name="remark[]" class="form-control" value="" placeholder="Enter Remark Here..."></td>'+
        '<td><button type="button" class="btn btn-primary" id="add"><i class="fa fa-plus"></i></button>' +
        '<button type="button" class="btn btn-danger" id="remove"><i class="fa fa-remove"></i></button></td>' +
      '</tr>');

    $('.select2').select2();
  }
  $(document).ready(function() {
    $(document).on('click', '#add', function() {
      append();
    });

    $(document).on('keypress', '#shiftOperation',function(e) {
      if(e.which == 13) {
        e.preventDefault();
        append();
        return false;
      }
    });

    $(document).on('click', '#remove', function () {
        $(this).closest('tr').remove();
        return false;
    });

    $('.select2').select2();

    $(document).on('change','#position', function() {
      var val = $(this).val();
      if(val == 6) {
        $('#cargo_muatan').val('Kosongan');
      } else {
        $('#cargo_muatan').val();
      }
    });
    // $(document).on('change', '#position', function() {
    //   // var id = $(this).closest('tr').find("#code_stby").val();
    //   // console.log(id)
    // })
  });
</script>