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
				Feedback Form - Theory
				</h1>
				</section>

				<!-- Main content -->
				<section class="content">
				<div class="row">

				<!-- /.col -->
				<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
				<h3 class="box-title">
				<?php
				$sid=$_SESSION['user_id'];
				$sem=$_SESSION['sem'];
				$div=$_SESSION['divi'];
				$batch=$_SESSION['batch'];

				if ($counter==null) {
				  echo "<b>Question No : ".$Question['0']->Qid ."</b><br/>" ;
				  echo "<br/><b>".$Question['0']->Ques." ?</b> <br/>";
				}
				else{
				  if (($counter['0']->count1)>(count($Question)-1)) {
					echo 'Thank you! Your feedback has already been submitted.';
				  }
				  else{
					echo "<b>Question No: ".$Question[$counter['0']->count1]->Qid ."</b><br/>" ;
					echo "<br/><b>".$Question[$counter['0']->count1]->Ques." ?</b> <br/>";
				  }
				}
				?>
				</h3>
				<br><br>
				<?php
				if ($counter==null) {
				echo '<b>A:</b> '.$Question['0']->opt_a."&nbsp;&nbsp;";
				echo '<b>B:</b> '.$Question['0']->opt_b."&nbsp;&nbsp;";
				echo '<b>C:</b> '.$Question['0']->opt_c."&nbsp;&nbsp;";
				echo '<b>D:</b> '.$Question['0']->opt_d."<br/>";
				}
				else{
				if (($counter['0']->count1)>(count($Question)-1)) {}
				else{
				echo '<b>A:</b> '.$Question[$counter['0']->count1]->opt_a."&nbsp;&nbsp;";
				echo '<b>B:</b> '.$Question[$counter['0']->count1]->opt_b."&nbsp;&nbsp;";
				echo '<b>C:</b> '.$Question[$counter['0']->count1]->opt_c."&nbsp;&nbsp;";
				echo '<b>D:</b> '.$Question[$counter['0']->count1]->opt_d."<br/>";
				}
				}
				$attr = array('class' => 'form-horizontal','method' => 'POST');
				echo form_open('ctrl_feedback/insert_fb',$attr);
				?>
				<br>
				</div>
				<!-- /.box-header -->
				<div class="box-body ">


				<!-- Horizontal Form -->
				<!-- /.box-header -->
				<!-- form start -->
				<?php
				if (($counter==null)|| !((($counter['0']->count1)>(count($Question)-1)))) {
				echo '<table class="table table-hover" >';
				echo '<div class="">';


				echo '<div class="nav" cellspacing=10px>';

				echo '<center><tr>';
				echo '<th >Sr.no</th>';
				echo '<th>Course</th>';
				echo '<th>Faculty</th>';
				//               echo '<th>Theory/Practicals</th>';
				echo '<th colspan="4">Select option</th>';
				echo '</tr>';


				}

				$count = 0;
				if ($counter==null) {

				echo '<input type="hidden" name="sid" value='.$sid.'>';
				echo '<input type="hidden" name="Qid" value='.$Question['0']->Qid.'>';
				echo '<input type="hidden" name="counter" value="0">';


				$i=1;
				foreach ($loadmat as $row) {

				 echo '<input type="hidden" name="fid'.$i.'" value="'.$row->Fid.'">';

				if($row->Theory==1)
				{

				echo '<tr>';
				 echo '<td>'.$i.'</td>' ;
				 echo'<td>'.$row->course .'</td>';
					echo'<td>'.$row->F_name .'</td>';
					/*if($row->Theory==1 && ($row->Prac==1&&($batch=='A' && $row->A==1) || ($batch=='B' && $row->B==1) || ($batch=='C' && $row->C==1) || ($batch=='D' && $row->D==1)))
					{
						$text='Theory & Practical';
					}
					else if($row->Theory==1 && ($row->Prac==1&&($batch=='A' && $row->A!=1) || ($batch=='B' && $row->B!=1) || ($batch=='C' && $row->C!=1) || ($batch=='D' && $row->D!=1)))
					{
						$text='Theory';
					}
					else if($row->Theory==1 && $row->Prac==0)
					{
						$text='Theory';
					}
					else if($row->Theory==0 && $row->Prac==1)
					{
						$text='Practical';
					}
					echo'<td>'.$text .'</td>';*/


				 $count++;
					echo '<td>A:<input type="radio" value = "A" name="r'.$count.'" required></td>';
					echo '<td>B:<input type="radio" value = "B" name="r'.$count.'"required></td>';
					echo '<td>C:<input type="radio" value = "C" name="r'.$count.'"required></td>';
					echo '<td>D:<input type="radio" value = "D" name="r'.$count.'"required></td>';
				echo '</tr>';
				$i++;
				}
				}
				echo '<input type="hidden" name="count" value='.$count.'/>';
				}

				elseif ((($counter['0']->count1)>(count($Question)-1))) {}
				else{

				echo '<input type="hidden" name="sid" value='.$sid.'>';
				echo '<input type="hidden" name="Qid" value='.$Question[$counter['0']->count1]->Qid.'>';
				echo '<input type="hidden" name="counter" value='.$counter['0']->count1.'>';


				$i=1;

				foreach ($loadmat as $row) {

				echo '<input type="hidden" name="fid'.$i.'" value="'.$row->Fid.'">';

				if($row->Theory==1)
				{

				echo '<tr>';
				 echo '<td>'.$i.'</td>' ;
				 echo'<td>'.$row->course .'</td>';
					echo'<td>'.$row->F_name .'</td>';
					/*if($row->Theory==1 && ($row->Prac==1&&($batch=='A' && $row->A==1) || ($batch=='B' && $row->B==1) || ($batch=='C' && $row->C==1) || ($batch=='D' && $row->D==1)))
					{
						$text='Theory & Practical';
					}
					else if($row->Theory==1 && ($row->Prac==1&&($batch=='A' && $row->A!=1) || ($batch=='B' && $row->B!=1) || ($batch=='C' && $row->C!=1) || ($batch=='D' && $row->D!=1)))
					{
						$text='Theory';
					}
					else if($row->Theory==0 && $row->Prac==1)
					{
						$text='Practical';
					}
					echo'<td>'.$text .'</td>';*/


				 $count++;

					echo '<td>A:<input type="radio" value = "A" name="r'.$count.'" required></td>';
					echo '<td>B:<input type="radio" value = "B" name="r'.$count.'" required></td>';
					echo '<td>C:<input type="radio" value = "C" name="r'.$count.'" required></td>';
					echo '<td>D:<input type="radio" value = "D" name="r'.$count.'" required></td>';
				echo '</tr>';
				$i++;
				}
				}
				echo '<input type="hidden" name="count" value='.$count.'/>';
				}
				?>



				</table>
				<?php
				if ($counter==null) {
				echo '<div class="box-footer">';
				echo '<input type="submit" value="Next >" class="btn btn-info pull-right"  >';
				echo '</div>';
				echo '</center>';
				}
				elseif ((!(($counter['0']->count1)>(count($Question)-1)))) {
				echo '<div class="box-footer">';
				echo '<input type="submit" value="Next >" class="btn btn-info pull-right"  >';
				echo '</div>';
				echo '</center>';
				}

				?>
				</div>
				<!-- /.box-body -->

				<!-- /.box-footer -->
				</form>
				</div>
				</div>
				<!-- /. box -->
				</div>
				<!-- /.col -->
				<!-- /.row -->
				</section>
				<!-- /.content -->
				</div>
		</main>
	</div>
	</div>
	<br><br>
    <footer class="app-footer" style="position: fixed; left: 0;  bottom: 0;   width: 100%; padding : 20px;">
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