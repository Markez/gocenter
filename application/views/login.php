
<body style="margin-top:10%;">
	<div class="container" id="login">

    <?php	echo form_open('start/validate','class="form-signin"');?>
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="namee" id="namee">
        <input type="password" class="input-block-level" name="pwd1" id="passe">
        <div id="warn" style="color:red;"><?php if(isset($warn)){
          echo $warn;
        }?></div>
        <a href="#modalpass" role="button" data-toggle="modal">Forgot your Password</a><br/><br>
        <button class="btn btn-primary" type="submit" id="loginb">
           Sign in
         
        </button>
      </form>

    </div> 

    <!-- modal class -->
<div id="modalpass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
  </div>
    <div class="modal-body" id="message">
      <?php echo form_open_multipart('start/pwd');?>
      <label class="control-label form-control">Enter your Email Address</label>
        <input type="text" class="input-block-level" placeholder="someon@something.com" name="pass" id="mailpass">
      <button class="btn btn-primary btn-lg-12" id="reset_btn">reset</button>
      <div ></div>
      <?php echo form_close();?>
    </div>
</div>

<div class="modal hide" id="ajax" role="dialog" aria-hidden="true" style="z-index:10000">
<div class="modal-dialog" >
  <div class="modal-content" style='text-align:center;color:black;background-color:#E6E6FA;'>
    <h2>LOADING ....</h2>
  </div>
</div>
</div>

    <?php require 'js/js.php';?>
</body>
</html>