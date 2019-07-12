<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>KJSCE Feedback System | Faculty as </title>
    
     <!-- Icons-->
   
     <link href="<?= base_url(); ?>assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <link href="<?= base_url(); ?>/dist/css/AdminLTE.min.css"rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<!-- style="width: 50%;min-height:1px;padding-right:15;padding-left:15px;float:left;position: relative;" -->

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php $this->load->view('navbar'); ?>
    <div class="app-body">
        <?php $this->load->view('sidebar'); ?>
<div class="top"style="margin-left:10px;">
         <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"style="padding-right:50px;">
          <?php
          for($i=0;$i<(count($Question));$i=$i+2)
          {
            echo '<div class="row">';
            echo '<div class="col-xs-6">';

                echo '<div class="box box-danger">';
                echo '<div class="box-header with-border">';
                echo '<h3 class="box-title col-xs-6">'.$Question[$i]->Qid.' '.$Question[$i]->Ques.'</h3>';

              echo '<div class="box-tools pull-right">';
                echo '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>';
                echo '</button>';
              echo '</div>';
            echo '</div>';
            echo '<div class="box-body" style="display: block;">';
              echo '<canvas id="pieChart'.$i.'" style="height: 265px !important; width: 530px !important;"></canvas>';
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
            echo '<div class="box-body"style="display: block;">';
              $a =$i+1;
              echo '<canvas id="pieChart'.$a.'" style="height: 265px !important; width: 530px !important;"></canvas>';
            echo '</div>';

          echo '</div>';

          echo '</div>';
        echo '</div>';
         }
        ?>

    </section>
    <!-- /.content -->
  </div>


  

    </div>
</div>
    <footer class="app-footer">
        <div class="text-center"style="position:static;">
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
   
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url(); ?>plugins/chartjs/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom-tooltips.min.js"></script>
  
    <script src="<?= base_url(); ?>dist/js/app.min.js"></script>
    <script src=" <?= base_url(); ?>plugins/fastclick/fastclick.js"></script>
    
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    

<script type="text/javascript">
$(function () {
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