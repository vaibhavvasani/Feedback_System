<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>KJSCE Feedback System | Admin</title>
    <!-- Icons-->
    <link href="<?=base_url();?>assets/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/simple-line-icons.css"
        rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

=======
>>>>>>> 364237711231d15b9f90b85afbb42cad3b58b3f9

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
    <?php $this->load->view('navbar');?>
    <div class="app-body">
        <?php $this->load->view('sidebar');?>

        <main class="main" style="overflow: hidden;">

            <div class="container-fluid mt-4">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="btn-group float-right">
                                        <button class="btn btn-transparent dropdown-toggle p-0" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-settings"></i>
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
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <button class="btn btn-transparent p-0 float-right" type="button">
                                        <i class="icon-location-pin"></i>
                                    </button>
                                    <div class="text-value">9.823</div>
                                    <div>Members online</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart2" height="70"></canvas>
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
                                            <i class="icon-settings"></i>
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
                                            <i class="icon-settings"></i>
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
            <select name="Faculty" id="faculty_select" style="margin: 5px; width: 470px; height: 38px; Border: none;">
              <option value="0">Select Faculty</option>
              <?php
              foreach ($facl_list as $rawData) {
                $faculty = $rawData->NameOfFaculty;
                $facultyid = $rawData->Fid;
                echo "<option value=\"$facultyid\">$faculty</option>";
              }
              ?>
            </select>
            <select name="class" id="class_select" style="margin: 5px; width: 140px; height: 38px; Border: none;">
              <option value="0">Select Class</option>
            </select>
            <select name="divion" id="div_select" style="margin: 5px; width: 150px; height: 38px; Border: none;">
              <option value="0">Select Division</option>
            </select>
            <select name="subject" id="sub_select" style="margin: 5px; width: 150px; height: 38px; Border: none;">
              <option value="0">Select Subject</option>
            </select>
            <select name="thpr" id="thpr_select" style="margin: 5px; width: 120px; height: 38px; Border: none;">
              <option value="0">TH/PR</option>
              <option value="theory">Theory</option>
              <option value="practical">Practal</option>
            </select>
            <button type="button" name="button" id="genresult" class="w3-btn w3-blue" style="margin: 5px; margin-left:650px; margin-top: 30px">Display Data</button>
            <button type="button" name="button" id="print" class="w3-btn w3-blue" style="margin: 5px; margin-top: 30px">Print Report</button>
            <a class="w3-btn w3-red" href="./Ctrl_admin/admin2" style="margin-top: 30px">Staff Wise Display</a>
          </div>
        </div>
        <!--<h3 class="box-title col-xs-11">Select Fields and Click Generate</h3>-->
        <div class="row" id="printdiv">
          <div class="col-xs-6">
            <div class="box-box-danger">
              <div class="box-header with-border">
              </div>
              <div class="box-body" id="out">
                <div id="rep">
                  <canvas id="barChart" style="height:500px"></canvas>
=======
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h4 class="card-title mb-0">Traffic</h4>
                                    <div class="small text-muted">November 2017</div>
                                </div>
                                <!-- /.col-->
                                <div class="col-sm-7 d-none d-md-block">
                                    <button class="btn btn-primary float-right" type="button">
                                        <i class="icon-cloud-download"></i>
                                    </button>
                                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary">
                                            <input id="option1" type="radio" name="options" autocomplete="off"> Day
                                        </label>
                                        <label class="btn btn-outline-secondary active">
                                            <input id="option2" type="radio" name="options" autocomplete="off"
                                                checked=""> Month
                                        </label>
                                        <label class="btn btn-outline-secondary">
                                            <input id="option3" type="radio" name="options" autocomplete="off"> Year
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                            <!-- /.row-->
                            <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                                <canvas class="chart" id="main-chart" height="300"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">Visits</div>
                                    <strong>29.703 Users (40%)</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">Unique</div>
                                    <strong>24.093 Users (20%)</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">Pageviews</div>
                                    <strong>78.706 Views (60%)</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">New Users</div>
                                    <strong>22.123 Users (80%)</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">Bounce Rate</div>
                                    <strong>40.15%</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


>>>>>>> 364237711231d15b9f90b85afbb42cad3b58b3f9
                </div>
            </div>
<<<<<<< HEAD
            <br />
            <div class="text-center">
              <h2 id="chart-name"></h1>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="" id="questions">
              <!--<p style="font-size:16px">Questions List</p>-->
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
=======
        </main>

    </div>
>>>>>>> 364237711231d15b9f90b85afbb42cad3b58b3f9
    <footer class="app-footer">
        <div class="text-center">
            <a href="#">KJSCE</a>
            <span>&copy; 2019 All rights reserved.</span>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="<?=base_url();?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url();?>assets/js/popper.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/pace.min.js"></script>
    <script src="<?=base_url();?>assets/js/perfect-scrollbar.min.js">
    </script>
    <script src="<?=base_url();?>assets/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?=base_url();?>assets/js/Chart.min.js"></script>
    <script
        src="<?=base_url();?>assets/js/custom-tooltips.min.js">
    </script>
    <script src="<?=base_url();?>assets/js/main.js"></script>
</body>

</html>