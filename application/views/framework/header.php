<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hauling V2 | <?php $a = empty($title) ? 'Dashboard' : $title; echo $a; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/Ionicons/css/ionicons.min.css');?>">
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('___/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('___/dist/css/skins/_all-skins.min.css');?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/morris.js/morris.css');?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/jvectormap/jquery-jvectormap.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('___/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('___/bower_components/select2/dist/css/select2.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url('___/css/font.css');?>">

  <!-- jQuery 3 -->
<script src="<?php echo base_url('___/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('___/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('___/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('___/bower_components/raphael/raphael.min.js');?>"></script>
<script src="<?php echo base_url('___/bower_components/morris.js/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('___/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('___/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo base_url('___/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('___/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('___/bower_components/moment/min/moment.min.js');?>"></script>
<script src="<?php echo base_url('___/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('___/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('___/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('___/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('___/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('___/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('___/bower_components/datatables.net/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('___/bower_components/datatables.net/js/buttons.html5.min.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('___/bower_components/datatables.net/js/jszip.min.js');?>" crossorigin="anonymous"></script>


<!-- FastClick -->
<script src="<?php echo base_url('___/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('___/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url('___/dist/js/pages/dashboard.js');?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('___/dist/js/demo.js');?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('___/bower_components/select2/dist/js/select2.full.min.js');?>"></script>

<script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>:9518/socket.io/socket.io.js"></script>
<script type="text/javascript">

  var socket = io.connect("<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>:9518");

  $(document).ready(function() {
      $(".alert-dismissible").fadeTo(3000, 500).slideUp(800, function(){
        $(".alert-dismissible").slideUp(800);
      });
    });


</script>
</head>