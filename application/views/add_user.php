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
    <link rel="stylesheet" href="<?=base_url();?>bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url(); ?>assets/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>icon/fontawesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>icon/ionicon/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>dist/css/AdminLTE.min.css">
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
           <form action="add_ind" id="ind" name="ind" method="session">
   <div class="form-group">
    <label for="exampleInputFid" class="bmd-label-floating">Enter Fid : </label>
    <input type="text" name="Fid" class="form-control" id="Fid" required>
  </div>
<div class="form-group">
    <label for="exampleInputUsername" class="bmd-label-floating">Enter Username : </label>
    <input type="text" name="UserId" class="form-control" id="UserId" required>
  </div>
  <div class="form-group">
    <label for="exampleInputName" class="bmd-label-floating">Enter Name : </label>
    <input type="text" name="AName" class="form-control" id="AName" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword" class="bmd-label-floating">Enter Password : </label>
    <input type="password" name="APwd" class="form-control" id="APwd" required>
  </div>
  
						  

               <button class="button new btn-lg round" style="width:80%;background-color: #83919c;" align="center" type="submit"><span></span><b style="color : #fafafa;"> Add </b></button>
        
</form>
        </div>
        </td>
        <td style="width : 50%;">
        <form action="next.php" id="csv" name="csv" method="POST">
        <center><div class="container" style="margin: 0 auto;padding-top: 30px;">
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" style="display: none;" required>
                    </span>
                </label>
                <input type="text" value="Upload csv here" class="form-control" readonly>
            </div>
<button class="button new btn-lg round" style="width:80%;background-color: #83919c;" align="center" type="submit"><span></span><b style="color: #fafafa;">Add</b></button>
        </div></center>
        </form>
        </td>
        </tr>
        </table>
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
    </script>
    <!-- <script src="<?=base_url();?>plugins/printer/printThis.js" charset="utf-8"></script> -->
     <!-- <script src=" <?=base_url();?>plugins/fastclick/fastclick.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>

    <!-- Custom AJAX Calls -->
   

            

</body>

</html>