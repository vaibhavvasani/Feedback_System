<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION['user_id'])){
  redirect(base_url());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>KJSCE Feedback System | Student </title>
    <!-- Icons-->
    <link href="<?= base_url(); ?>assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/simple-line-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url();?>bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>dist/css/AdminLTE.min.css">


    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    // Shared ID
    gtag('config', 'UA-118965717-3');
    // Bootstrap ID
    gtag('config', 'UA-118965717-5');
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<div class="wrapper">
    <?php $this->load->view('navbar'); ?>
    <div class="app-body">
        <?php $this->load->view('sidebar'); ?>
        <main class="main" style="overflow: hidden;">
            <div class="container-fluid mt-4">
		<div class="content-wrapper" style="margin-left: 0px;">
				<!-- Content Header (Page header) -->
				<section class="content-header">
				<h1>
				Feedback Form - Review
				</h1>
				</section>
				<br>
				<!-- Main content -->
			<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header with-border">
			<form method="post" action="./review/savereview/">
			<table>
			<thead>
			<tr>
			<th>Name of the Faculty</th>
			<th><center>Review (max 128 words)</center></th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($rows as $data) {
			echo "<tr>";
			echo "<td><b>$data->NameOfFaculty</b>&nbsp&nbsp&nbsp&nbsp&nbsp</td>";
			echo "<td><br><textarea rows='2' cols='100' maxlength='128' style='border-radius: 25px;  border: 2px solid ; padding: 20px; width: 450px;
					height: 120px;   box-shadow: 8px 8px; resize: none; ' required name=\"$data->fid\"></textarea></td>";
			echo "</tr>";
			}
			?>
			</tbody>
			</table>
			<div style="padding-top:80px; text-align: center">
			<input type="submit" class="w3-btn w3-round-large" style="padding:15px;   background-color: #ecf0f5; ">
			<br><br>
			</div>
			</form>
			</div>
			</div>
			</div>
			<br>
			<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			</div>
			<!-- /.content -->
			</div>
			</div>
			</main>
	<br><br>
	
    <footer class="app-footer" style="position: relative; left: 0;  bottom: 0;   width: 100%; padding : 20px;">
        <div>
            <a href="#">KJSCE</a>
            <span>&copy; 2019 All rights reserved.</span>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url(); ?>assets/js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom-tooltips.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script>
</body>
</html>