<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Y-HUB</title>
      <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
                <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
                <link type="text/css"  rel="stylesheet" href="<?php echo base_url();?>css/css/font-awesome.min.css">
                    <link href="<?php echo base_url();?>bootp/docs/assets/css/bootstrap.css" rel="stylesheet">
                <link type="text/css"  href="<?php echo base_url();?>css/css/bootplus.css" rel="stylesheet">
                 <link type="text/css"  href="<?php echo base_url();?>css/css/css/docs.css" rel="stylesheet">

          <link type="text/css"  href="<?php echo base_url();?>css/css/custom.css" rel="stylesheet">
                <link type="text/css"  href="<?php echo base_url();?>css/css/bootplus-responsive.css" rel="stylesheet">
                 <link href="<?php echo base_url();?>css/home.css" rel="stylesheet">
                
                   <script type="text/javascript" src='<?php echo base_url();?>css/css/jquery.form.js'></script>
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/jquery-1.11.2.min.js"></script>
                     <link href="<?php echo base_url();?>bootp/docs/assets/js/bootstrap.min.js" rel="stylesheet">
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/bootstrap-transition.js"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/bootstrap-carousel.js"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/bootstrap-dropdown.js"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/bootstrap-button.js"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/bootstrap-modal.js"></script>
                    <script type="text/javascript" src="<?php echo base_url();?>css/css/js/bootstrap-collapse.js"></script>
                    <script type="text/javascript" src='<?php echo base_url();?>js/script.js'></script>



                    
      <style type="text/css">
      body {
        padding-top: 46px;
        padding-bottom: 40px;
      }
       .hero-unit {
          background: #00001C url(../assets/img/cover4.jpg) no-repeat top left;
       }
       .hero-unit h1 {color: #FFF}
       .hero-unit p {color: #F5F5F5}
      </style>
   
  </head>
      <div class="navbar navbar-fixed-top">
         <div class="navbar-inner">
           <div class="container">
             <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="brand" href="<?php echo base_url();?>index.php/start">Y-GOCENTER</a>
             <div class="nav-collapse collapse">
               <ul class="nav">
                 <li><a href="<?php echo base_url();?>index.php/start">Home</a></li>
                 <li><a href="<?php echo base_url();?>index.php/start/About">About Us</a></li> 
                 <li><a href="<?php echo base_url();?>index.php/start/contact">Contacts</a></li>       
               </ul>

               <ul class="nav pull-right">
                <?php 
                if($this->session->userdata('fname')==null)
                {
                ?>
                <li><a href="<?php echo base_url();?>index.php/start/login">Login</a></li>
                 <li><a href="<?php echo base_url();?>index.php/start/views">Signup</a></li>
                 <?php 
               }
                else
                {
                  
                ?>
                <?php 
                  if($this->session->userdata('img')=='')
                  {
                    echo '<img src="'.base_url().'/profile/user.png" style="width:40px;height:40px;">';
                  }
                  else
                  {
                    echo '<img src="'.base_url().'/profile/'.$this->session->userdata('img').'" style="width:40px;height:40px;">';
                  }
                  ?>
                <div class="btn-group">
                  
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    <?php echo "<li>".$this->session->userdata('fname')."</li>";?>
  </a>
  <span class="glyphicon glyphicon-chevron-down"></span>
  <ul class="dropdown-menu">
    <!-- dropdown menu links -->
    <li><a href="<?php echo site_url('start/ep');?>">Edit Profile</a></li>
    <li><a href="<?php echo site_url('start/logout');?>">Logout</a></li>
  </ul>
</div>
    <?php 

                }?>
               </ul>
 
 
             </div><!--/.nav-collapse -->
           </div>
         </div>
       </div> 

        <body>