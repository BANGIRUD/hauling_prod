<?php
  $username     = $this->session->userdata('username');
  $full_name    = $this->session->userdata('full_name');
  $level        = $this->session->userdata('level');
  $area         = $this->session->userdata('area');
  $rom          = $this->session->userdata('rom');
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
<!-- Logo -->
      <a href="index2.html" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>H</b>P</span>
<!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Hauling</b> PROD</span>
      </a>
<!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('___/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo ucfirst($full_name);?></span>
                  </a>
                  <ul class="dropdown-menu">
    <!-- User image -->
                    <li class="user-header">
                      <img src="<?php echo base_url('___/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
                      <p>Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p>
                    </li>
    <!-- Menu Body -->
                    <li class="user-body">
                      <div class="row">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </div>
    <!-- /.row -->
                    </li>
    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?php echo base_url('Dash/profile');?>" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo base_url('Auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
<!-- Control Sidebar Toggle Button -->
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              </ul>
            </div>
        </nav>
    </header>
<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
<!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url('___/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo ucfirst($full_name);?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
<!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <?php if ($level != 'rom'): ?>
        <li class="header">DASHBOARD MONITORING</li>
        <?php endif; ?>

        <?php if ($level != 'rom'): ?>
        <li class="treeview <?php if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'daily_monitoring_muatan' || $this->uri->segment(2) == 'daily_control_passing'||$this->uri->segment(2) == 'dashboard_ach_passingunit'||$this->uri->segment(2) == '') { echo ' active';}?>">
          <a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
            <ul class="treeview-menu">
              <li <?php if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') { echo' class="active"';} ?>><a href="<?php echo base_url('dash/index');?>"><i class="fa fa-desktop"></i>Monitoring Unit CSA </a></li>
              <li <?php if($this->uri->segment(2) == 'daily_monitoring_muatan') { echo' class="active"';} ?>><a href="<?php echo base_url('dash/daily_monitoring_muatan');?>"><i class="fa fa-desktop"></i>Monitoring Muatan</a></li>
              <li <?php if($this->uri->segment(2) == 'daily_control_passing') { echo' class="active"';} ?>><a href="<?php echo base_url('dash/daily_control_passing');?>"><i class="fa fa-desktop"></i>Quality Control Passing</a></li>           
              <li <?php if($this->uri->segment(2) == 'dashboard_ach_passingunit') { echo' class="active"';} ?>><a href="<?php echo base_url('dash/dashboard_ach_passingunit');?>"><i class="fa fa-pie-chart"></i>Achievement Passing</a></li>
            </ul>
        </li>
        <?php endif; ?>

        <?php if ($level != 'rom' && $level != 'checker'): ?>
        <li class="header">INPUT</li>
        <?php endif;?>

        <?php if ($level != 'rom' && $level != 'checker'): ?>
        <li <?php if($this->uri->segment(2) == 'daily_record_production') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/daily_record_production');?>"><i class="fa fa-edit"></i> <span>Record Production</span></a>
        </li>
        <?php endif;?>

        <li class="header">VIEW</li>

        <?php if ($level != 'rom'): ?>
        <li class="treeview <?php if($this->uri->segment(2) == 'daily_monitoring_operations') { echo ' active';}?>">
          <a href="#"><i class="fa fa-video-camera"></i> <span>Monitoring Post</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(2) == 'daily_monitoring_operations' && $this->uri->segment(3) == 'M') { echo' class="active"';} ?>><a href="<?php echo base_url('dash/daily_monitoring_operations/M');?>"><i class="fa fa-circle-o"></i>Muatan </a></li>
            <li <?php if($this->uri->segment(2) == 'daily_monitoring_operations' && $this->uri->segment(3) == 'K') { echo' class="active"';} ?>><a href="<?php echo base_url('dash/daily_monitoring_operations/K');?>"><i class="fa fa-circle-o"></i>Kosongan</a></li>
          </ul>
        </li>
        <?php endif;?>

        <?php if ($level != 'checker'): ?>
        <li <?php if($this->uri->segment(2) == 'daily_rom_operations') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/daily_rom_operations');?>">
            <i class="fa fa-cubes "></i> <span>Monitoring ROM</span>
          </a>
        </li>
        <li class="header">REPORT</li>
        <li <?php if($this->uri->segment(2) == 'report_rom') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/report_rom');?>">
            <i class="fa fa-server"></i><span>Report ROM</span>
          </a>
        </li>
        <?php endif;?>
        <?php if ($level != 'rom'): ?>
        <li class="header">EQUIPMENT</li>
        <?php endif;?>

        <?php if ($level != 'rom'): ?>
        <li <?php if($this->uri->segment(2) == 'populasi_unit') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/populasi_unit');?>">
            <i class="fa fa-truck"></i><span>Populasi Unit</span>
            <span class="pull-right-container">
          </a>
        </li>
        <li <?php if($this->uri->segment(2) == 'raw_material') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/raw_material');?>">
            <i class="fa fa-exchange"></i><span>Raw Material</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
         <li class="header">SETTING</li>
        <li <?php if($this->uri->segment(2) == 'setting_unit_operasi') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/setting_unit_operasi');?>">
            <i class="fa fa-gears"></i> <span>Setting Unit </span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li <?php if($this->uri->segment(2) == 'daily_plan_supplypassing') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/daily_plan_supplypassing');?>">
            <i class="fa fa-steam"></i><span>Supplay Passing</span>
            <span class="pull-right-container">
          </a>
        </li>
        <li <?php if($this->uri->segment(2) == 'daily_overshift_unit') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/daily_overshift_unit');?>">
            <i class="fa fa-sitemap"></i> <span>Overshift Unit</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li <?php if($this->uri->segment(2) == 'quality') { echo' class="active"';} ?>>
          <a href="<?php echo base_url('Dash/quality');?>">
            <i class="fa fa-database"></i> <span>Database Quality</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php endif;?>

        <li class="header">ACCOUNTS</li>
        <li><a href="<?php echo base_url('Dash/profile');?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
        <li><a href="<?php echo base_url('Auth/logout');?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
      </section>
<!-- /.sidebar -->
    </aside>
