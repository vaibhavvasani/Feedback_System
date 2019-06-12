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

          <?php
          for($i=0;$i<(count($Question));$i=$i+2)
          {
            echo '<div class="row">';
            echo '<div class="col-xs-6">';

                echo '<div class="box box-danger">';
                echo '<div class="box-header with-border">';
                echo '<h3 class="box-title col-xs-11">'.$Question[$i]->Qid.' '.$Question[$i]->Ques.'</h3>';

              echo '<div class="box-tools pull-right">';
                echo '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>';
                echo '</button>';
              echo '</div>';
            echo '</div>';
            echo '<div class="box-body">';
              echo '<canvas id="pieChart'.$i.'" style="height:250px"></canvas>';
            echo '</div>';

          echo '</div>';

          echo '</div>';


        echo '<div class="col-xs-6">';

                echo '<div class="box box-danger">';
                echo '<div class="box-header with-border">';
                echo '<h3 class="box-title col-xs-11">'.$Question[$i+1]->Qid.' '.$Question[$i+1]->Ques.'</h3>';

              echo '<div class="box-tools pull-right">';
                echo '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>';
                echo '</button>';
              echo '</div>';
            echo '</div>';
            echo '<div class="box-body">';
              $a =$i+1;
              echo '<canvas id="pieChart'.$a.'" style="height:250px"></canvas>';
            echo '</div>';

          echo '</div>';

          echo '</div>';
        echo '</div>';
         }
        ?>

    </section>
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
<script src=" <?=base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--Charts-->
<script src=" <?=base_url();?>plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src=" <?=base_url();?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src=" <?=base_url();?>dist/js/app.min.js"></script>
<script>
$(document).ready(function(){
	$(".treeview").removeClass('active');
	$(".treeview").eq(4).addClass('active');
});
</script>
<script type="text/javascript">

  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

      //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
<?php
   for($i=0;$i<(count($Question));$i++)
   {
       $q = $i+1;
    echo 'var pieChartCanvas = $("#pieChart'.$i.'").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: "'.${"A".$q}["0"]->res.'",
        color: "#f56954",
        highlight: "#f56954",
        label: "'.$Question[$i]->opt_a.'"
      },
      {
        value: "'.${"B".$q}["0"]->res.'",
        color: "#00a65a",
        highlight: "#00a65a",
        label: "'.$Question[$i]->opt_b.'"
      },
      {
        value: "'.${"C".$q}["0"]->res.'",
        color: "#f39c12",
        highlight: "#f39c12",
        label: "'.$Question[$i]->opt_c.'"
      },
      {
        value: "'.${"D".$q}["0"]->res.'",
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "'.$Question[$i]->opt_d.'"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);';
   }
?>
  });
</script>
</body>
</html>
