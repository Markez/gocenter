

      <!-- Main hero unit for a primary marketing message or call to action -->
       <div class="span12" > 
 <div class="container">
      <div class="span8" style="margin-top:1%; margin-left:5%;" >
                <div id="myCarousel" class="carousel slide">
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?php echo base_url();?>images/1.png" alt="150x150" style="width:150%; -webkit-height:500px;height:500px;">
                    <div class="carousel-caption"><a href="<?php echo base_url();?>index.php/start/pricing">
                      <h4>BRONZE LEVEL</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                   </a> </div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>images/2.png" alt="150x150" style="width:150%; -webkit-height:500px;height:500px;">
                    <div class="carousel-caption"><a href="<?php echo base_url();?>index.php/start/pricing">
                      <h4>SILVER LEVEL</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </a></div>
                  </div>
                  <div class="item">
                    <img src="<?php echo base_url();?>images/1.png" alt="150x150" style="width:150%; -webkit-height:500px;height:500px;">
                    <div class="carousel-caption"><a href="<?php echo base_url();?>index.php/start/pricing">
                      <h4>GOLD LEVEL</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </a></div>
                  </div>
                  </div>
                  <!-- Carousel nav -->
                  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>



</div>
              <div class="span3 pull-right">

            <div class="card">
               <h3 class="card-heading simple"><center>QUICK LINKS</center></h3>
               <div class="card-body">
                                   <div class="bottom">
                                 <a href="<?php echo base_url();?>index.php/start/about" class="btn btn-block">
                                    <i class=""></i>
                                    About Us 
                                 </a>
                                    <a href="<?php echo base_url();?>index.php/start/gallery" rel="publisher" class="btn btn-block">
                                    <i class="#"></i>
                                    Places Visited
                                 </a>
                                  <a href="<?php echo base_url();?>index.php/start/pricing" rel="publisher" class="btn btn-block">
                                    <i class="#"></i>
                                    Book Now
                                 </a>
                                    <a href="#" rel="publisher" class="btn btn-block">
                                    <i class="#"></i>
                                    Booking Calender
                                 </a>
                                 </a>
                                    <a href="<?php echo base_url();?>index.php/start/contact" rel="publisher" class="btn btn-block">
                                    <i class="#"></i>
                                    Contact Us
                                 </a>
                              </div>
               </div>
               <div class="card-actions">
               </div>
            </div>

       </div>

      </div> </div>




      <div class="container">


      <!-- Example row of columns -->
      <div class="row">
        <div class="span8">

            <div class="card">
               <h3 class="card-heading simple"><center>NEWS AND UPCOMING EVENTS</center></h3>
               <div class="card-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  <p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  <p>
               </div>
               <div class="card-actions">
      
               </div>
            </div>

        </div>
        <div class="span4">

            <div class="card">
               <h3 class="card-heading simple"><center>BOOKING CALENDERS</center></h3>
               <?php if ($this->session->userdata('id')==null)
                 {
                 ?>
                 <center>Days Booked</center>
                 <?php
                 }
                 else
                 {
                 ?>
               <center>Days I have Booked</center>
               <?php
               }
               ?>
               <div class="card-body" id="cal">
                 <?php if (isset($calendar))
                 {
                  echo $calendar;
                 }?>
               </div>
               <div class="card-actions">
                  
               </div>
            </div>

       </div>
        

      </div>

<div class="modal hide" id="ajax" role="dialog" aria-hidden="true" style="z-index:400000">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="unbkb" style="color:red">X</button>
  </div>
<div class="modal-dialog" >
  <div class="modal-content" id="ajaxb" style='text-align:center;color:black;background-color:#E6E6FA;'>
    <h2>LOADING ....</h2>
  </div>
</div>
</div>
 
<?php require 'js/home.php';?>