<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Sign in</title>
      <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">

    <!-- Le styles -->
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
      <link href="<?php echo base_url();?>bootp/docs/assets/css/bootplus.css" rel="stylesheet">
      <link href="<?php echo base_url();?>bootp/docs/assets/css/bootplus-responsive.css" rel="stylesheet">
      <link href="<?php echo base_url();?>bootp/docs/assets/css/font-awesome-ie7.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>css/forms.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

      <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <![endif]-->

      <!-- Fav and touch icons -->

	<script type="text/javascript" src='<?php echo base_url();?>js/jquery.js'></script>
	<script type="text/javascript" src='<?php echo base_url();?>js/script.js'></script>
  </head>

  <body>
    <div class="container" style="margin-top:2%;">

      <?php	echo form_open('start/signup','class="form-signin"');?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label class="control-label form-control">User Name</label>
        <input type="text" class="input-block-level" placeholder="User Name" name="name" id="name">
         <label class="control-label form-control">Email Address</label>
          <input type="text" class="input-block-level" placeholder="Email address" name="mail" id="mail">
          <label class="control-label form-control">Phone Number</label>
          <input type="text" class="input-block-level" placeholder="07xxxxxxxx" name="tel" id="tel">
         <label class="control-label form-control">Password</label>
        <input type="password" class="input-block-level" placeholder="Password" name="pwd1" id="pwd1">
          <label class="control-label form-control">Password</label>
        <input type="password" class="input-block-level" placeholder="Password" name="pwd2" id="pwd2">
        <div id="warn" style="color:red;"><?php if(isset($sign)){
        	echo $sign;
        }?></div>

          <button class="btn btn-primary" type="reset" value="Reset">
          Reset
 
        </button>
        <button class="btn btn-primary" type="submit" id="signup">
           Sign in
 
        </button>
      <?php echo form_close();?>

    </div> <!-- /container -->

 
 

  