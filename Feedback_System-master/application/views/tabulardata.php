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
