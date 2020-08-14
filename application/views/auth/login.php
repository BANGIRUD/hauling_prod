<style type="text/css">
	.login-page	{
		background-repeat: no-repeat;
		background-color: none;
		background-image: url('___/dist/img/a.JPG');
		background-size: cover;
	}
</style>
<body class="hold-transition login-page" >
	<div class="login-box" style="background-color: #dfe6e9">
		<div class="login-logo">
			<a href="#"><b>Hauling</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body"  style="background-color: #dfe6e9" >
			<?php
			if ($this->session->flashdata('msg') != '') {
				echo $this->session->flashdata('msg');
			}
			;?>
<form method="post" action="<?php echo base_url('Auth/action');?>">
	<div class="form-group has-feedback">
		<label>Username</label>
		<input type="text" class="form-control" placeholder="Enter username ..." name="username" autocomplete="off" />
		<span class="glyphicon glyphicon-user form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
	<label>Password</label>
		<input type="password" class="form-control" placeholder="***************" name="password" autocomplete="off" />
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	</div>
	<label>Area</label>
	<div class="form-group has-feedback">
		<select id="area" class="form-control" placeholder="Area" name="area" autocomplete="off" > 
			 <?php
                foreach ($area as $value) {
                  $selected = $area == $value['id'] ? ' selected' : '';
                  echo '<option value="' . $value['id'] . '"' . $selected . '>' . $value['name'] . '</option>';
                }
              ?>
              <option value="">ALL</option>
		</select> 
	</div>
	<label>Rom</label>
	<div class="form-group has-feedback">
		<!-- <select class="form-control" name="analysis" disabled="disabled"> -->
			<select class="form-control" name="rom" disabled="disabled">
	    	
          <option value="0"></option>
	    	<?php
                foreach ($rom as $value) {
                  $selected = $area == $value['id'] ? ' selected' : '';
                  echo '<option value="' . $value['id'] . '"' . $selected . '>' . $value['name'] . '</option>';
                }
          ?>
	    </select>
	</div>
	<div class="row">
		<div class="col-xs-4 col-xs-offset-8">
			<button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
		</div>
		<!-- /.col -->
	</div>
</form>
</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('___/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('___/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('___/plugins/iCheck/icheck.min.js');?>"></script>
<script type="text/javascript">
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});

	$(document).on('change','#area',function(){
		var id = $(this).val();
		if(id == '108') {
			$("select[name=rom]").attr('disabled', false);
		} else {
			$("select[name=rom]").attr('disabled', true);
			$("select[name=rom]").val(0);
		}
	});
</script>
</body>
</html>
