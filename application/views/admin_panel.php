<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>KJSCE Feedback System | Admin</title>
    <!-- Icons-->
    <link href="<?= base_url(); ?>assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    
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
    <?php $this->load->view('navbar'); ?>
    <div class="app-body">
        <?php $this->load->view('sidebar'); ?>

        <main class="main" style="overflow: hidden;">

            <div class="container-fluid mt-4">
                <div class="animated fadeIn">
                    <div class="row">
                        <!--starting of col1---->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="text-value">9.823</div>
                                    <div>Members online</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <!-- /starting of col2-->    
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="text-value">9.823</div>
                                    <div>Members online</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-warning">
                                <div class="card-body pb-0">
                                    <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="text-value">9.823</div>
                                    <div>Members online</div>
                                </div>
                                <div class="chart-wrapper mt-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-0">
                                    <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="text-value">9.823</div>
                                    <div>Members online</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
                    <!-- HEAD -->
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper" style="padding-left: 10px">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    /*$attr = array('class' => 'form-horizontal' ,'method' => 'POST');
echo form_open('Ctrl_admin/generate',$attr);
echo '<input type="submit" value="Generate">';
echo '</form>';*/
                                    ?>
                                    <select name="Faculty" id="faculty_select" class="faculty_select"
                                        style="margin: 5px; width: 470px; height: 38px; Border: none;">
                                        <option value="0">Select Faculty</option>
                                        <?php
                                        foreach ($facl_list as $rawData) {
                                            $faculty = $rawData->NameOfFaculty;
                                            $facultyid = $rawData->Fid;
                                            echo "<option value=\"$facultyid\">$faculty</option>";
                                        }
                                        ?>
                                    </select>
                                    <select name="class" id="class_select"
                                        style="margin: 5px; width: 140px; height: 38px; Border: none;">
                                        <option value="0">Select Class</option>                                    </select>
                                    <select name="divion" id="div_select"
                                        style="margin: 5px; width: 150px; height: 38px; Border: none;">
                                        <option value="0">Select Division</option>
                                    </select>
                                    <select name="subject" id="sub_select"
                                        style="margin: 5px; width: 150px; height: 38px; Border: none;">
                                        <option value="0">Select Subject</option>
                                    </select>
                                    <select name="thpr" id="thpr_select"
                                        style="margin: 5px; width: 120px; height: 38px; Border: none;">
                                        <option value="0">Select TH/PR</option>
                                    </select>
                                    <button type="button" name="button" id="genresult" class="btn btn-primary"
                                        style=" margin-left:650px; margin-top: 20px;width:10em;height:2.8em">Display Data</button>
                                    <button type="button" name="button" id="print"class="btn btn-primary"
                                        style=" margin-top: 20px;width:10em;height:2.8em">Print Report</button>
                                    <a class="btn btn-outline-danger "style="margin-top:20px;width:13em;height:2.8em;    background-color: #f86c6b;
    padding-top: 8px;color:white;" href="./Ctrl_admin/admin2">Staff
                                        Wise Display</a>
                                </div>
                            </div>
                            <br> <!--add spacing between ---->

                            <!--<h3 class="box-title col-xs-11">Select Fields and Click Generate</h3>-->
                            <div class="row" id="printdiv">
                                <div class="col-xs-6">
                                    <div class="box-box-danger">
                                        <div class="box-header with-border">
                                        </div>
                                        <div class="box-body">
                                            <div id="rep">
                                                
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row" id="printdiv">
                                                            <div class="col-sm-5">
                                                                <h4 class="card-title mb-0">Faculty Chart</h4>
                                                            </div>
                                                            <!-- /.col sm 5-->
                                                            <div class="col-sm-12 d-none d-md-block">
                                                                <div id="out">
                                                                    <canvas id="barChart" style="height:480px"></canvas>
                                                                </div>

                                                            </div>
                                                            <!-- /.col sm-12 d-->
                                                        </div>
                                                        <!-- /.row-->
                                                        <div class="chart-wrapper"
                                                            style="height:300px;margin-top:40px;">
                                                            <canvas class="chart" id="main-chart" height="300"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="text-center">
                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="" id="questions">
                                            <p style="font-size:16px">Questions List</p>
                                        </div>
                                    </div>
                                </div>
                        </section>
                        <!-- /.content -->
                    </div>

                </div>
            </div>
        </main>

    </div>
    <footer class="app-footer">
        <div class="text-center">
            <a href="#">KJSCE</a>
            <span>&copy; 2019 All rights reserved.</span>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/perfect-scrollbar.min.js">
    </script>
    <script src="<?= base_url(); ?>assets/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url(); ?>assets/js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom-tooltips.min.js">
  
    </script>
    <!-- <script src="<?=base_url();?>plugins/printer/printThis.js" charset="utf-8"></script> -->
     <!-- <script src=" <?=base_url();?>plugins/fastclick/fastclick.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <!-- Custom AJAX Calls -->
    <script type="text/javascript">
        $(function() {
            // Print Report
            // $("#print").on('click',function() {
            //   var img = new Image;
            //   img.src = ($("#barChart")[0]).toDataURL("image/png");
            //   var tmp = $("#out").html();
            //   $("#rep").html("<img src=\""+($("#barChart")[0]).toDataURL("image/png")+"\"></img>");
            //   $("#printdiv").printThis();
            // });

            $('#faculty_select').select2();
            $('#class_select').select2();
            $('#div_select').select2();
            $('#sub_select').select2();
            $('#thpr_select').select2();

            // Get Classes for a faculty
            $("#faculty_select").on('change',function() {
              $.ajax({
                url:"<?=base_url();?>/index.php/ctrl_admin/getc/"+$("#faculty_select").val(),
                type:"POST",
                async: false,
                success:function(result){
                  //alert(result);
                  if(result != '0'){
                    $("#class_select").html("<option value=\"0\">Select Class</option>"+result);
                  }
                  else{
                    alert("Faculty Doesn't Teach to any class");
                  }
                }
              });
            });

            // Get Division for a class
            $("#class_select").on('change',function() {
              $.ajax({
                url:"<?=base_url();?>/index.php/ctrl_admin/getdiv/"+$("#faculty_select").val()+"/"+$("#class_select").val(),
                type:"POST",
                async: false,
                success:function(result){
                  if(result != '0'){
                    $("#div_select").html("<option value=\"0\">Select Division</option>"+result);
                  }
                  else{
                    alert("Faculty Doesn't Teach to any class");
                  }
                }
              });
            });

            // Get subjects for a division
            $("#div_select").on('change',function() {
              $.ajax({
                url:"<?=base_url();?>/index.php/ctrl_admin/getsub/"+$("#faculty_select").val()+"/"+$("#class_select").val()+"/"+$("#div_select").val(),
                type:"POST",
                async: false,
                success:function(result) {
                  if(result != '0'){
                    $("#sub_select").html("<option value=\"0\">Select Subject</option>" + result);
                  }
                  else{
                    alert("Faculty Doesn't Teach to any class");
                  }
                }
              });
            });

            // Get theory or practical as per subject
            $("#sub_select").on('change',function(){
                $.ajax({
                    url:"<?=base_url();?>/index.php/ctrl_admin/checkthpr/"+$("#faculty_select").val()+"/"+$("#class_select").val()+"/"+$("#div_select").val()+"/"+$("#sub_select").val(),
                    type:"POST",
                    async: false,
                    success:function(result){
                      if(result != '0'){
                        $("#thpr_select").html(result);
                      }
                      else{
                        alert("Faculty Doesn't Teach to any class");
                      }
                    }
                });
            });


            // Bar charts
             var barChartData = {
                labels: [],
                datasets: [{
                    label: 'Percentage',
                    data: [],
                    backgroundColor:'rgba(255, 159, 64, 1)'
                }]
            };
            
            $("#genresult").on('click',function(){
              $("#out").html("<div id=\"rep\"><canvas id=\"barChart\" style=\"height:500px\"></canvas></div>");
                  var ctx = document.getElementById("barChart").getContext("2d");
                  window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                      scales: {
                        xAxes:[{
                          barThickness:50
                        }],
                        yAxes: [{
                          ticks: {
                            beginAtZero:true,
                            max:100,
                            stepSize:10
                          }
                        }]
                      }
                    }
                });

                var tmp = $("#class_select").val();
                if(tmp == '1' || tmp == '2') yr = "FE";
                if(tmp == '3' || tmp == '4') yr = "SE";
                if(tmp == '5' || tmp == '6') yr = "TE";
                if(tmp == '7' || tmp == '8') yr = "BE";
                if($("#thpr_select").val() == 1) str = "<?=base_url();?>/index.php/ctrl_admin/gendatath/"+$("#faculty_select").val()+"/"+$("#class_select").val()+"/"+$("#div_select").val()+"/"+$("#sub_select").val();
                if($("#thpr_select").val() == 2) str = "<?=base_url();?>/index.php/ctrl_admin/gendatapr/"+$("#faculty_select").val()+"/"+$("#class_select").val()+"/"+$("#div_select").val()+"/"+$("#sub_select").val();
                $.ajax({
                    url:str,
                    type:"POST",
                    async: false,
                    success:function(result){
                        // console.log(typeof(result));
                      if(result != '0'){
                        var json = JSON.parse(JSON.stringify(result));
                        var count = [];
                        var data = [];

                        // console.log('JSON: ', json);

                        for(key in json){
                          data.push(json[key]);
                          count.push(key.toString());
                        }

                        // console.log(count);
                        barChartData.labels = count;
                        barChartData.datasets[0].data = data;
                        barChartData.datasets[0].label = $("#faculty_select option:selected").text();
                        window.myBar.update();
                        $(".chart").html(yr+"-"+$("#div_select").val()+" "+$("#sub_select").val()+" "+$("#thpr_select option:selected").text());
                        str=undefined;
                      }
                      else{
                        alert("Faculty Doesn't Teach to any class");
                      }
                    }
                });
            });
        });
    </script>

            

</body>

</html>