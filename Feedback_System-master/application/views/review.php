<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION['user_id'])){
  redirect(base_url());
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sakec Feedback | Mailbox</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?=base_url();?>bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>icon/fontawesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>icon/ionicon/css/ionicons.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php $this->load->view('header'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>
      <form method="post" action="./review/savereview/">
        <table>
          <thead>
            <tr>
              <th>NameOfFaculty</th>
              <th>Review(128 words)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($rows as $data) {
              echo "<tr>";
              echo "<td>$data->NameOfFaculty</td>";
              echo "<td><textarea required name=\"$data->fid\"></textarea></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
        <input type="submit">
      </form>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.2
      </div>
      <strong>Copyright &copy; 2015-2016 <a href="http://www.shahandanchor.com">SAKEC(IT dept)</a>.</strong> All rights
      reserved.
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src=" <?=base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src=" <?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
  <!-- Slimscroll -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  .ques {
    font-size: 20px;
    word-wrap: break-word;
  }
  </style>
  <script src=" <?=base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src=" <?=base_url();?>plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src=" <?=base_url();?>dist/js/app.min.js"></script>
</body>
</html>
