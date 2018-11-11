<html>
<head>
<meta charset="utf-8">
<title>Pricing Table</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo base_url();?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>/css/hosting.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>css/forms.css" rel="stylesheet">

  <script type="text/javascript" src='<?php echo base_url();?>js/jquery.js'></script>
  <script type="text/javascript" src='<?php echo base_url();?>boot/js/bootstrap.min.js'></script>
  <script type="text/javascript" src='<?php echo base_url();?>js/script.js'></script>

</head>




<body>
 
  <div class="container">  <!-- Contaner Starts -->
    

  <div class="row-fluid PageHead"> <!-- Description Start -->
    <div class="span12">
      <h1>Plans & Pricing</h1>
    </div>
  </div> <!-- Description End -->
  
 
  <div class="row-fluid" style="margin-left:6%;margin-right:6% auto;">
  <!-- Row2 start -->
    <div class="span3 PlanPricing template4" id="table">
      <div class="planName"> <span class="price">$99</span>
        <h3>Bronze</h3>
        <p>Monthly Plan</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url();?>images/1.png"></li>
          <li>Pellentesque odio nisi, euismod in. Host multiple sites under one account, each with separate control panels. Starting at</li>
          
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-target='#mymodal' data-toggle='modal' id="bronze" class="btn btn-success btn-large">Book </a> </p>
    </div>

    <div class="span3 PlanPricing template4" id="table">
      <div class="planName"> <span class="price">$199</span>
        <h3>Silver</h3>
        <p>Monthly Plan</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url();?>images/2.png"></li>
          <li>Pellentesque odio nisi, euismod in. Host multiple sites under one account, each with separate control panels. Starting at</li>
          
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-target='#mysilver' data-toggle='modal' id="silver" class="btn btn-success btn-large">Book </a> </p>
    </div>

    <div class="span3 PlanPricing template4" id="table">
      <div class="planName"> <span class="price">$299</span>
        <h3>Gold</h3>
        <p>Monthly Plan</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url();?>images/1.png"></li>
          <li>Pellentesque odio nisi, euismod in. Host multiple sites under one account, each with separate control panels. Starting at</li>
          
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-target='#mygold' data-toggle='modal' class="btn btn-success btn-large">Book </a> </p>
    </div>  <!-- Price template4 Ends -->

    
  

  </div>  <!-- Row2 ends -->
  
  <!-- modal calender -->
  
  <div class="modal fade" id="mymodal" role="dialog"
aria-labelledby="MyModalLabel" aria-hidden="true" style="z-index:100000">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  </div>
<center><h2><div class="package"></div></h2></center>
<p><center>Click on a Date to Book</center></p>
  <div id="Bronze" class="modal-body">
      <?php echo $calendar;?>
      </div>
</div>

  <div class="modal fade" id="mysilver" role="dialog"
aria-labelledby="MyModalLabel" aria-hidden="true" style="z-index:100000">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  </div>
<center><h2><div class="package"></div></h2></center>
<br><center>Click on a Date to Book</center>
  <div id="Silver" class="modal-body">
      <?php echo $calendar;?>
      </div>
</div>

  <div class="modal fade" id="mygold" role="dialog"
aria-labelledby="MyModalLabel" aria-hidden="true" style="z-index:100000">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  </div>
<center><h2><div class="package"></div></h2></center>
<br><center>Click on a Date to Book</center>
  <div id="Gold" class="modal-body">
      <?php echo $calendar;?>
      </div>
</div>
<div id="sessid" ><?php echo $this->session->userdata('id')?></div>

<div class="modal hide" id="ajax" role="dialog" aria-hidden="true" style="z-index:400000">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="unbkb" style="color:red">X</button>
  </div>
<div class="modal-dialog" id="messagem">
  <div class="modal-content" id="ajaxb" style='text-align:center;color:black;background-color:#E6E6FA;'>
    <h2>LOADING ....</h2>
  </div>
</div>
</div>

 <?php require 'js/js.php';?>
  <br><br> <br><br> <br><br>
</div> <!-- Container ends -->
</body>
</html>