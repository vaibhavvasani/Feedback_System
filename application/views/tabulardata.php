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
    <title>KJSCE Feedback | Class Wise Feedback</title>
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

  <!-- Datatable -->
  <link href="<?= base_url(); ?>assets/css/DataTables/jquery.dataTables.min.css" rel="stylesheet">

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
  <body>

    
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

  <!-- PrintThis -->
  <link href="<?= base_url(); ?>assets/css/PrintThis/print.min.css" rel="stylesheet">
  <script src="<?= base_url(); ?>assets/js/PrintThis/print.min.js"></script>

  <!-- Loader -->
  <link href="<?= base_url(); ?>assets/css/Loader/loader.min.css" rel="stylesheet">


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
          <div class="content-wrapper" style="padding-left: 10px">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="row">
                <div class="col">
                  <select id="sem"  style="margin: 5px; width: 140px; height: 38px; Border: none;">
                    <option  value="0">Select SEM</option>
                    <?php
                    foreach ($sem as $key => $value) {
                      echo "<option value=\"".$value->Sem."\">".$value->Sem."</>";
                    }
                    ?>
                  </select>
                  <select id="divi" style="margin: 5px; width: 140px; height: 38px; Border: none;">
                    <option value="0">Select Division</option>
                  </select>
                  <button type="button" class="btn btn-primary" style=" margin-left:50px; width:10em;height:2.8em; margin-right: 5px;" id="final">Display  Data</button>
                  <button type="button" name="button" id="print" class="btn btn-primary" style="width:10em;height:2.8em" onclick="printJS('printdiv', 'html')">Print Report</button>
                  
                </div>
              </div>
              <br>
              <!--add spacing between ---->

              <!--<h3 class="box-title col-xs-11">Select Fields and Click Generate</h3>-->
              <div class="row" id="printdiv">
                <div class="col">
                  <div class="box-box-danger">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                      <div id="rep">

                        <div class="card">
                          <div class="card-body">
                            <div class="row" id="printdiv">
                              <!-- /.col sm 5-->
                              <div class="col-sm-12 d-none d-md-block">
                                  <div id="out">
                                    <p class="h3 mb-2 pb-2">Theory</p>
                                    <table id="questions_th_table" class="display table-striped table-bordered table-hover mb-4 " style="width:100%">
                                      <tr>
                                        <th>Faculty/Question</th>
                                        <?php
                                        
                                        foreach ($questions_th as $key => $value) {
                                          echo "<th>Q".($key+1)."</th>";
                                        }
                                        echo "<th>Average</th>";
                                        ?>
                                      </tr>
                                      <?php
                                      foreach ($staffListTh as $key => $value) {
                                        echo "<tr>";
                                        echo "<td>".$value->F_name."</td>";
                                        foreach ($thdata[$value->Fid] as $key => $value) {
                                          echo "<td>".$value."</td>";
                                        }
                                        echo "</tr>";
                                      }
                                      ?>
                                    </table>
                                    <div class="questions_th_list">
                                      <p class="h4">Questions List Theory</p>
                                      <ol>
                                        <?php
                                        foreach ($questions_th as $key => $value) {
                                          echo "<li>".$value->Ques."</li>";
                                        }
                                      ?>
                                      </ol>
                                    </div>
                                    <p class="h3 mb-2 pb-2 mt-3 pt-4">Practical </p>
                                    <table id="questions_pr_table" class="display table-striped table-bordered table-hover mb-4" style="width:100%">
                                      <tr>
                                        <th>Faculty/Question</th>
                                        <?php
                                        foreach ($questions_pr as $key => $value) {
                                          echo "<th>Q".($key+1)."</th>";
                                        }
                                        echo "<th>Average</th>";
                                        ?>
                                      </tr>
                                      <?php
                                      foreach ($staffListPr as $key => $value) {
                                        echo "<tr>";
                                        echo "<td>".$value->F_name."</td>";
                                        foreach ($prdata[$value->Fid] as $key => $value) {
                                          echo "<td>".$value."</td>";
                                        }
                                        echo "</tr>";
                                      }
                                      ?>
                                    </table>
                                     <div class="questions_pr_list">
                                      <p class="h4">Questions List Practical</p>
                                      <ol>
                                        <?php
                                        foreach ($questions_pr as $key => $value) {
                                          echo "<li>".$value->Ques."</li>";
                                        }
                                      ?>
                                      </ol>
                                    </div>
                                  </div>
                              </div>
                              <!-- /.col sm-12 d-->
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
    <div class="text-center" style="position:static;">
      <strong>Copyright&copy;<a href="#" style="color:rgb(48, 119, 180);">KJSCE </a></strong> <span>2019-2020 All rights reserved.</span>
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
  <!-- <script src="<?= base_url(); ?>plugins/printer/printThis.js" charset="utf-8"></script> -->
  <!-- <script src=" <?= base_url(); ?>plugins/fastclick/fastclick.js"></script> -->
  <script src="<?= base_url(); ?>assets/js/main.js"></script>

  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

  <script src="<?= base_url(); ?>assets/js/Loader/loader.min.js"></script>

  <script src="<?= base_url(); ?>assets/js/DataTable/jquery.dataTables.min.js"></script>


  <!-- Custom AJAX Calls -->
  <script type="text/javascript">
    $(function() {

      $('#sem').select2();
      $('#divi').select2();

      $("table").DataTable();

      
      $("#final").on('click',function(){
        window.location.href = "<?=base_url();?>index.php/ctrl_admin/table/"+$("#sem").val()+"/"+$("#divi").val();
      });

      $("#sem").on('change',function(){
        $.ajax({
          url:"<?=base_url();?>index.php/ctrl_admin/getalldiv/"+$("#sem").val(),
          type:"POST",
          success:function(result){
            //alert(result);
            if(result != '0'){
              $("#divi").html("<option value=\"0\">Select Division</option>"+result);
            }
          }
        });
      });
       
    });
  </script>



</body>

</html>
    
</html>
