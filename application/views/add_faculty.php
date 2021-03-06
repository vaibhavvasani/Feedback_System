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
    <link href="<?=base_url();?>assets/css/simple-line-icons.css"rel="stylesheet">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main styles for this application-->
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!--jquery -->
  <script src="<?=base_url();?>dist/js/jquery-3.3.1.slim.min.js"></script>
  

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
    <script>
    $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php $this->load->view('navbar'); ?>
    <div class="app-body">
        <?php $this->load->view('sidebar'); ?>

        <main class="main" style="overflow: hidden;">
             <table style="width : 100%;"> 
             <tr>
             <td style="width : 50%;">  
			<div class="container" style="width: 50%;margin: 0 auto;padding-top: 30px;">
           <?php $attr = array('name' => 'form1','method' => 'POST');
              echo form_open('Ctrl_admin/add_faculty',$attr); ?>
   <div class="inner-width"style="font-size: 20px;text-transform: uppercase;display: inline-block;border-bottom: 4px solid;padding-bottom:0px;color: #333;text-align: center;margin-bottom:20px">
                <p>Faculty-Login</p>
    </div>
   <div class="form-group">
    <label for="exampleInputFid" class="bmd-label-floating">Enter Faculty-ID : </label>
    <input type="text" name="Fid" class="form-control" id="Fid" pattern=".{4,4}" oninvalid="this.setCustomValidity('Please enter your 4 digit Fid')" oninput="setCustomValidity('')" required>
  </div>
  <div class="form-group">
    <label for="exampleInputName" class="bmd-label-floating">Enter Name : </label>
    <input type="text" name="FName" class="form-control" id="FName" oninvalid="this.setCustomValidity('Please enter Faculty Name')" oninput="setCustomValidity('')" required>
  </div>
  <div class="form-group">
    <label for="exampleInputName" class="bmd-label-floating">Select Gender : </label>
    <select name="abbre" class="form-control" id="abbre" oninvalid="this.setCustomValidity('Please select gender')" oninput="setCustomValidity('')" required>
    <option value="" selected>Choose Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword" class="bmd-label-floating">Enter Password : </label>
    <input type="password" name="FPwd" class="form-control" id="FPwd" pattern=".{8,15}" oninvalid="this.setCustomValidity('Please enter 8-15 digit password ')" oninput="setCustomValidity('')" required>
  </div>
  
						  

               <button class="button new btn-lg round" style="width:80%;background-color: #83919c;" align="center" type="submit"><span></span><b style="color : #fafafa;"> Add </b></button>
        
</form>
		<?php 
		if(isset($_POST['success']))
		{
			$resp=$_POST['resp'];
			if($_POST['success']==1)
			{
				print "<p style='color:green;'>$resp</p>";
			}
			else if($_POST['success']==0)
			{
				print "<p style='color:red;'>$resp</p>";
			}
		}
		?>
        </div>
        </td>
        <td style="width : 50%;position: fixed;top: 50%;left: 50%;">
        <?php $attr = array('name' => 'formcsv','method' => 'POST','id' => 'formcsv','accept' => '.csv','enctype' => 'multipart/form-data');
              echo form_open('Ctrl_admin/add_faculty',$attr); ?>
        <center>
            
        <div class="container">
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="input-group" >
                <label class="input-group-btn">
                    <span class="btn btn-primary" style="margin-right:20px;width:10em;height:2.8em;">
                        Browse&hellip; <input type="file" name="csvfac" style="display: none;">
                    </span>
                </label>
                <input type="text" style="padding:10px" name="uploadcsv" value="Upload csv here.." class="form-control" readonly>
            </div>
<button class="button new btn-lg round" style="width:80%;background-color: #83919c;" type="submit"><span></span><b style="color: #fafafa;">Add</b></button>
        </div>
    </center>
        </form>
        <?php 
			if(isset($_POST['success']))
			{
				if($_POST['success']==21)
				{
					$count=$_POST['count'];
					print "<p style='color:green;'>$resp</p>";
					print "<p style='color:green;'>Number of records added are $count</p>";
				}
				else if($_POST['success']==20)
				{
					print "<p style='color:red;'>$resp</p>";
				}
		}
		?>
        </td>
        </tr>
        </table>
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
    <script src="<?= base_url(); ?>assets/js/custom-tooltips.min.js"></script>
    <!-- Plugins and scripts required by this view-->

    <!-- <script src="<?=base_url();?>plugins/printer/printThis.js" charset="utf-8"></script> -->
     <!-- <script src=" <?=base_url();?>plugins/fastclick/fastclick.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>

    <!-- Custom AJAX Calls -->
   

            

</body>

</html>
