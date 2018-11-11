
<body style="margin-top:10%;">

  <div  class="container" id="login" >
    <div class="row">
      
      <div class="" style='margin-left:0%;'>
    <?php	echo form_open('start/editp','class="form-signin"');?>
        <h2 class="form-signin-heading">Change Your User Profile</h2>
         <label class="control-label form-control">User Name</label>
        <input type="text" class="input-block-level" placeholder="User Name" name="name" id="name">

          <label class="control-label form-control">Phone Number</label>
          <input type="text" class="input-block-level" placeholder="07xxxxxxxx" name="phone" id="tel">
        <a href="#modalpass" role="button" data-toggle="modal">Change your Password</a><br/><br>
        <a href="#myupload" role="button" data-toggle="modal">Upload your profile</a><br/><br>
        <button class="btn btn-primary" type="submit">
           change
        </button>
        <?php echo form_close();?>

          </div>

          <div class="modal fade" id="myupload" role="dialog"
aria-labelledby="MyModalLabel" aria-hidden="true" style="z-index:100000">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
  </div>
          <div class="" style="margin-left:15%;">
             <?php echo form_open_multipart('start/upload');?>
     <input type="file" name="userfile" style="display:none" id="fileElem" onchange="handleFiles(this.files)">
      <img src="<?php echo base_url();?>/images/add.png" width="200" heigth="300" id="fileSelect"  onclick="document.getElementById('fileElem').click();" style="cursor:pointer;border:1px solid lightgrey;margin-left:20%;"><br><br>
       <label id="info" class="text-info" style="margin-left:20%;"></label>
       <input type='submit' class='btn btn-primary' style="margin-left:20%;" id="upb" value="submit">
        <?php echo form_close();?>
       <div id="warn" style="margin-left:20%;color:red;"></div>
      </div>
    </div>

        </div>
    </div> 

<div id="modalpass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
  </div>
    <div class="modal-body" id="message">
      <label class="control-label form-control">Password</label>
        <input type="password" class="input-block-level" placeholder="Password" name="pwd1" id="pwd1">
        <label class="control-label form-control">Confirm Password</label>
        <input type="password" class="input-block-level" placeholder="Password" name="pwd2" id="pwd2">
        <button class="btn btn-primary" type="submit" id="chp">
           Change Password
         
        </button>
        <div id="warn" class="text-success"></div>
 </div>
</div>
<?php require 'js/home.php';?>

</body>
</html>