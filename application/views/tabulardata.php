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
    <title>Table</title>
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
  <body>
    <select id="sem">
      <option  value="0">Select SEM</option>
      <?php
      foreach ($sem as $key => $value) {
        echo "<option value=\"".$value->Sem."\">".$value->Sem."</>";
      }
      ?>
    </select>
    <select id="divi">
      <option value="0">Select Division</option>
    </select>
    <button type="button" id="final">Get Table Data</button>
    <h1>Theory</h1>
    <table border="1px">
      <tr>
        <th>Faculty/Question</th>
        <?php
        foreach ($questions_th as $key => $value) {
          echo "<th>Q".($key+1)."</th>";
        }
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
    <div class="">
      <h2>Questions List Theory</h2>
      <?php
      foreach ($questions_th as $key => $value) {
        echo "<p>".$value->Qid.")".$value->Ques."</p>";
      }
      ?>
    </div>
    <h1>Practical</h1>
    <table border="1px">
      <tr>
        <th>Faculty/Question</th>
        <?php
        foreach ($questions_pr as $key => $value) {
          echo "<th>Q".($key+1)."</th>";
        }
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
    <div class="">
      <h2>Questions List Practical</h2>
      <?php
      foreach ($questions_pr as $key => $value) {
        echo "<p>".$value->Qid.")".$value->Ques."</p>";
      }
      ?>
    </div>
  </body>
  <script src=" <?=base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#final").on('click',function(){
        window.location.href = "<?=base_url();?>/index.php/ctrl_admin/table/"+$("#sem").val()+"/"+$("#divi").val();
      });
      $("#sem").on('change',function(){
        $.ajax({
          url:"<?=base_url();?>/index.php/ctrl_admin/getalldiv/"+$("#sem").val(),
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
</html>
