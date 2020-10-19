<?php
  $by_area   = $this->session->userdata('area');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Monitoring Data
      <small><?=get_enum($by_area)?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Monitoring Data <?=get_enum($by_area)?></li>
    </ol></br>
    <div class="row">
      <div class="col-md-2">        
          <div class="form-group">
            <label>Rom Filter :</label>
            <select class="form-control" name="shift_code" id="shift_code">
              <?php foreach ($shift_code as $key) {
                echo '<option value="'.$key['code'].'">'.$key['code'].' </option>';
              }?>
            </select>
          </div>
      </div>
      <div class="col-md-2">        
          <div class="form-group">
            <label>Time Filter :</label>
            <select class="form-control" name="shift_code" id="shift_code">
              <?php foreach ($shift_code as $key) {
                echo '<option value="'.$key['code'].'">'.$key['code'].' </option>';
              }?>
            </select>
          </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-xs-12">
              </div>  
            </div>
          </div>
        </div>
      </div>     
    </div>
  </section>
</div>

<script type="text/javascript">

</script>