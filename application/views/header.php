
    
<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SAKEC</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="welcome.php" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>dist\img\avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>dist\img\avatar5.png" class="img-circle" alt="User Image">

                <p>
                <?=$_SESSION['fname'];?> <?=$_SESSION['lname'];?><br>
                  - <?=$_SESSION['user_type'];?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/Ctrl_feedback/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
        <li class="header" style=" font-size: 20px; color: white;"><p>MENU</p></li>

            <li class="treeview">
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span>Test</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
            <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-minus"></i>My records</a></li>
            <li><a href="#"><i class="fa fa-minus"></i> Upcoming test</a></li>
            </ul>
          </li>
          <?php 
          if ($_SESSION['user_type'] == 'admin')
          {
            ?>

            <li class="treeview">
              <a href="">
                <i class="fa fa-book"></i>
                <span>Backup</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>index.php/Ctrl_admin/export_feedback_pr"><i class="fa fa-minus"></i>Practical Feedback</a></li>
                <li><a href="<?php echo base_url();?>index.php/Ctrl_admin/export_feedback_th"><i class="fa fa-minus"></i>Theory Feedback</a></li>
                <li><a href="<?php echo base_url();?>index.php/Ctrl_admin/export_counter_th"><i class="fa fa-minus"></i>Theory Counter Feedback</a></li>
                <li><a href="<?php echo base_url();?>index.php/Ctrl_admin/export_counter_pr"><i class="fa fa-minus"></i>Practical Counter Feedback</a></li>
                <li><a href="<?php echo base_url();?>index.php/Ctrl_admin/export_reviews"><i class="fa fa-minus"></i>Reviews</a></li>
            </ul>
          </li>
          <?php
          } 
          ?>
            <li class="treeview active">
          <a href="ctrl_feedback">
            <i class="fa fa-edit"></i>
            <span>Feedback</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
            <ul class="treeview-menu active">
            <li><a href="ctrl_feedback"><i class="fa fa-minus"></i> Theory</a></li>
            <li><a href="ctrl_feedback_pr"><i class="fa fa-minus"></i> Practical</a></li>
            <li><a href="review"><i class="fa fa-minus"></i>Review</a></li>
            </ul>
          </li>
            <li class="treeview">
          <a href="Ctrl_feedback/logout">
            <i class="fa fa-sign-out"></i>
            <span>Logout</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          </li>
        </ul>
    <!-- /.sidebar -->
  </aside>

