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
         <div id="login">
                         <form style="margin-bottom: 0px !important;" class="form-horizontal" name="login" action="login/authlogin" method="post">
                             <div class="content">

                                 <h4 class="title text-center">Log In</h4>
                                 <?php echo $this->session->flashdata('failed'); echo $this->session->flashdata('successreset'); ?>
                                 <div class="form-group">
                                     <div class="col-sm-12">
                                         <div class="input-group">
                                             <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                             <input name="email" type="email" placeholder="Email" id="email" class="form-control" required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-12">
                                         <div class="input-group">
                                             <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                             <input name="password" type="password" minlength="8" placeholder="Password" id="password" class="form-control" required="" />
                                         </div>
                                     </div>
                                 </div>

                             </div>
                             <div class="foot">
                                 <a class="btn btn-default" href="#" id="forgot">Forgot?</a>
                                 <button class="btn btn-primary" data-dismiss="modal" type="submit">Log In</button>
                             </div>
                         </form>
           </div>
           <div id="lupa" style="display:none">
           <form style="margin-bottom: 0px !important;" class="form-horizontal" name="forgot" action="<?php echo base_url('Login/forgot') ?>" method="post">
                             <div class="content">
                                 <h4 class="title text-center">Forgot</h4>
                                 <div class="form-group">
                                     <div class="col-sm-12">
                                         <div class="input-group">
                                             <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                             <input name="email" type="email" placeholder="Enter Email" id="email" class="form-control" required=""/>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="foot">
               <a class="btn btn-default" href="#" id="kembali">Back</a>
               <button class="btn btn-primary" type="submit">Send</button>
                             </div>
                         </form>
           </div>
                     </div>
                 </div>
                 <div class="text-center out-links"><a href="<?php echo base_url(); ?>">&copy; 2018 Sehari</a></div>
             </div>

         </div>

         <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
         <script type="text/javascript">
             $(function(){
                 $("#cl-wrapper").css({opacity:1,'margin-left':0});
             });
     $(document).ready(function(){
       $("#forgot").click(function(){
       $("#login").slideUp(300);
       $("#lupa").slideDown(300);
       });
       $("#kembali").click(function(){
       $("#login").slideDown(300);
       $("#lupa").slideUp(300);
       });
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
