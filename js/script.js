// signup button
$(document).ready(function(){
	$('#signup').click(function(){
		var name = $("#name").val();
		var mail = $("#mail").val();
		var tel = $("#tel").val();
		var pwd = $("#pwd1").val();
		var pwd2 = $("#pwd2").val();
		var bool = ValidateEmail(mail);


		if(name=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#name").css('border','1px solid red');
			$('#warn').html('please fill in your username above :(');
				return false;
		}
		else if(mail=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#mail").css('border','1px solid red');
			$('#warn').html('please fill in your Email Address above :(');
				return false;
		}
		else if(bool==false)
		{
			$('input').css('border','1px solid lightgrey');
				$("#mail").css('border','1px solid red');
			$('#warn').html('please fill in a valid Email Address above :(');
				return false;
		}
		else if(tel=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#tel").css('border','1px solid red');
			$('#warn').html('please fill in your Mobile Number above :(');
				return false;
		}
		else if($('#tel').val().length<10)
		{
			$('input').css('border','1px solid lightgrey');
			$("#tel").css('border','1px solid red');
			$('#warn').html('please enter a valid Mobile Number above :(');
				return false;
		}
		else if(pwd=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd1").css('border','1px solid red');
			$('#warn').html('please fill in your Password above :(');
				return false;
		}
		else if(pwd2=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd2").css('border','1px solid red');
			$('#warn').html('please fill in your Password above :(');
				return false;
		}
		else if(pwd2==pwd1)
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd2").css('border','1px solid red');
			$("#pwd1").css('border','1px solid red');
			$('#warn').html('Your Password do not match :(');
				return false;
		}
		else if($('#pwd1').val().length<8)
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd2").css('border','1px solid red');
			$("#pwd1").css('border','1px solid red');
			$('#warn').html('Your Password must be atleast 8 characters :(');
				return false;
		}
		else{
			return true;
		}
		return false;
	});

});
    function ValidateEmail(mail)   
    {  
     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
      {  
        return (true) ; 
      }   
        return (false) ; 
    }  