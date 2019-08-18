<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>KJSCE Feedback System | Attendance</title>
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

    
    <link href="<?= base_url(); ?>assets/css/DataTables/jquery.dataTables.min.css" rel="stylesheet">

    <!-- PrintThis -->
    <link href="<?= base_url(); ?>assets/css/PrintThis/print.min.css" rel="stylesheet">

    <script src="<?= base_url(); ?>assets/js/PrintThis/print.min.js"></script>

    
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
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper" style="padding-left: 20px;position:relative;">
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
                                    <select name="class" id="class_select"
                                        style="margin: 5px; width: 200px; height: 38px; Border: none;">
                                        <option value="0">Select Class</option>                                    </select>
                                    <select name="divion" id="div_select"
                                        style="margin: 5px; width: 200px; height: 38px; Border: none;">
                                        <option value="0">Select Division</option>
                                    </select>
                                    
                                    <button type="button" name="button" id="genresult" class="btn btn-primary"
                                        style="width:10em; margin-right:10px; margin-left:50px;height:2.8em">Display Data</button>
                                    <button type="button" name="button" id="print" class="btn btn-primary"
                                        style="margin-right:10px; width:10em;height:2.8em" onclick="printJS('printdiv', 'html')">Print Report</button>

                                    <button type="button" name="button" id="strictness" class="btn btn-primary"
                                        style="width:10em;height:2.8em">Above 75%</button>
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
                                                <div class="card"  id="class-data-title" style="display:none;">
                                                    <div class="card-body">
                                                        <div class="row" id="printdiv"style="margin: 5px">
                                                            <div class="col-md-5 mb-2 pb-2">
                                                                <h4 class="card-title mb-0 font-weight-normal">Class Data</h4>
                                                            </div>
                                                            <div class="row" id="printdiv">
                                                                <div class="col-xs-7 charts">
                                                                    <div class="box-body">
                                                                        <div class="col-md-12" id="out"></div>
                                                                        </div>
                                                                    <br />
                                                                    <div class="text-center">
                                                                        <h2 id="chart-name"></h1>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-7">
                                                                  <div class="" id="questions">
                                                                    <!--<p style="font-size:16px">Questions List</p>-->
                                                                  </div>
                                                                </div>
                                                              </div>
          
                                                    </div>
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
        <div class="text-center"style="position:static;">
            <strong>Copyright&copy;<a href="#"style="color:rgb(48, 119, 180);">KJSCE </a></strong> <span>2019-2020 All rights reserved.</span>
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

    <script src="<?= base_url(); ?>assets/js/DataTable/jquery.dataTables.min.js"></script>


    <!-- Custom AJAX Calls -->
    <script type="text/javascript">
        $(function() {
            $('#class_select').select2();
            $('#div_select').select2();
            $("#example").DataTable();

            $.ajax({
                url:"<?=base_url();?>/index.php/ctrl_admin/getSemesters",
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

            $.ajax({
                url:"<?=base_url();?>/index.php/ctrl_admin/getDivisions",
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

            
            $("#genresult").on('click',function() {
                $.ajax({
                    url:"<?=base_url();?>/index.php/ctrl_admin/getStudentAttendance/"+$("#class_select").val()+"/"+$("#div_select").val(),
                    type:"POST",
                    async: false,
                    success:function(result){
                        console.log(result);

                        $("#class-data-title").css('display', 'block');

                        $("#out").empty();
                        
                        $("#out").append(result);
                    }
                });
            });

            $("#strictness").on('click',function() {
                $.ajax({
                    url:"<?=base_url();?>/index.php/ctrl_admin/getStudentAttendanceStrict/"+$("#class_select").val()+"/"+$("#div_select").val(),
                    type:"POST",
                    async: false,
                    success:function(result){
                        // console.log(result);
                        $("#out").empty();
                        $("#out").append(result);
                    }
                });
            });

            
        });
    </script>

            

</body>

</html>