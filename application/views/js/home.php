<script type="text/javascript">

$(document).on('click','#upb',function(){
  var fileName=$('#fileElem').val();
if($('#fileElem').val()=='')
{
  $('#warn').html("Please select a file");
  return false;
}
else if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(fileName)) 
  {              
    alert('You must select an image file only');      
     return false;         
  }
else
  {
      return true;
  }

});

$(document).on('change','#fileElem',function(){
  var value=$(this).val();
  $('#info').html(value);
})

$(document).on('click','#chp',function(){
	
	var pw1=$('#pwd1').val();
	var pw2=$('#pwd2').val();

	 if(pw1=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd1").css('border','1px solid red');
			$('#warn').html('please fill in your Password above :(');
				return false;
		}
		else if(pw2=='')
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd2").css('border','1px solid red');
			$('#warn').html('please fill in your Password above :(');
				return false;
		}
		else if(pw2!=pw1)
		{
			$('input').css('border','1px solid lightgrey');
			$("#pwd2").css('border','1px solid red');
			$("#pwd1").css('border','1px solid red');
			$('#warn').html('Your Password do not match :(');
				return false;
		}
		else
		{
			$.ajax({
        url:"<?php echo site_url('start/passedit')?>",
        type:'POST',
        data:{
         pass:pw1
        },
        success: function(msg)
        {
         if(msg==true)
         {
         	 window.location.href='<?php echo site_url("start/index");?>';
         }
         else
         {
         	$('#warn').html(msg);
         	$('#pwd2').val('');
         	$('#pwd1').val('');

         }
        }
      });
			return false;
		}
});

// previous and next functions for calender

 $(document).on('click','.cal_nav',function(){
   var href= $(this).attr('href');

  var length=href.length;
   var href1=href.substring(0, 42);
   var date=href.substring(42, length);
    var pckg = $('.package').html();
    var url = href1+'cal2'+"/"+date;
    $(this).attr('id','cal2'+pckg);
   $.ajax({
        url:url,
        type:'POST',
        success: function(msg)
        {
          $("#cal").html(msg);
        }
      });
    $.ajax({
  beforeSend: function(){
       $('#ajax').show()
    },
  complete: function(){
       $('#ajax').hide();
       $("#message").html("");
  }
});

    return false;
 });
</script>