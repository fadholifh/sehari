<!DOCTYPE html>
 <html lang="en">

     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta name="description" content="">
         <meta name="author" content="">
         <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/icons.png">

         <title> Sehari - Login</title>

         <!-- Bootstrap core CSS -->
         <link href="<?php echo base_url(); ?>assets/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/css/fontawesome-all.min.css">

         <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
         <!--[if lt IE 9]>
           <script src="<?php echo base_url(); ?>assets/../../assets/js/html5shiv.js"></script>
           <script src="<?php echo base_url(); ?>assets/../../assets/js/respond.min.js"></script>
   <![endif]-->

         <!-- Custom styles for this template -->
         <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />

     </head>

     <body class="texture">

         <div id="cl-wrapper" class="login-container">
             <div class="middle-login">
                 <div class="block-flat">
                     <div class="header">
                         <h3 class="text-center"><i class="fa fa-leaf"></i> Sehari</h3>
                     </div>
                     <div>
                       <form style="margin-bottom: 0px !important;" class="form-horizontal" action="<?php echo base_url('Login/resetProccess') ?>" method="POST" parsley-validate novalidate>
              					<div class="content">
              						<h5 class="title text-center"><strong>Ganti Password</strong></h5>
                          <?php echo $this->session->flashdata('failed'); ?>
              							<div class="form-group">
              								<div class="col-sm-12">
              									<div class="input-group">
              										<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
              										<input type="hidden" name="forgot" value="<?php echo $kode; ?>">
              										<input id="pass1" type="password" name="password" placeholder="Password" required class="form-control" minlength="8"></div>
                                <div id="email-error"></div>
              								</div>
              							</div>
              							<div class="form-group">
              								<div class="col-sm-12">
              									<div class="input-group">
              										<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
              										<input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" minlength="8"></div>
                                <div id="email-error"></div>
              								</div>
              							</div>
                          <button class="btn btn-block btn-primary btn-rad btn-lg" type="submit">Reset Password</button>
              					</div>
              			  </form>
                     </div>
                 </div>
                 <div class="text-center out-links"><a href="<?php echo base_url(); ?>">&copy; 2018 Sehari</a></div>
             </div>

         </div>

         <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
         <script src="<?php echo base_url(); ?>assets/js/jquery.parsley/parsley.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
         <script type="text/javascript">
           $(document).ready(function(){
             $('form').parsley();
           });
         </script>
         <!-- Bootstrap core JavaScript
         ================================================== -->
         <!-- Placed at the end of the document so the pages load faster -->
         <script src="<?php echo base_url(); ?>assets/js/behaviour/voice-commands.js"></script>
         <script src="<?php echo base_url(); ?>assets/js/bootstrap/dist/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.js"></script>
         <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.pie.js"></script>
         <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.resize.js"></script>
         <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.labels.js"></script>
     </body>

 </html>
