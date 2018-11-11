<script type="text/javascript">



$('#loginb').click(function(){
  var name=$('#namee').val();
  var pass=$('#passe').val();
  if(name=='')
  {
    $('input').css('border','1px solid lightgrey');
    $("#namee").css('border','1px solid red');
    $('#warn').html('Fill in your email :(');
  }
  else if(pass=='')
  {
    $('input').css('border','1px solid lightgrey');
    $("#passe").css('border','1px solid red');
    $('#warn').html('Fill in your Password :(');
  }
  else
  {
$.ajax({
            url:"<?php echo site_url('start/validate');?>",
            type: 'POST',
    data: "namee="+name+"&passe="+pass,
    success: function(msg)
    {
       if(msg.indexOf("true")>=0)
       {
        window.location.href='<?php echo site_url("start/index");?>';
       }
       else
       {
          $('#warn').html(msg+' :(');
       }
    }
        });
$.ajax({
  beforeSend: function(){
       $('#ajax').show()
    },
  complete: function(){
       $('#ajax').hide();
  }
});
  }
  return false;
  });

 $(document).on('click','#unbkb',function(){
    $('#ajax').hide();
 });
  //unbooking button 
   $(document).on('click','#ubky',function(){

    var pckg = $('.package').html();
   var ids = $(this).attr('name');
   $.ajax({
        url:"<?php echo site_url('start/unbk');?>",
        type:'POST',
        data:{
         id:ids
        },
        success: function(msg)
        {
         // $('#ajax').fadeOut(1000000).html("<h3>"+msg+"<h3>");
           // $("#"+pckg).html(msg);
           $('#ajaxb').html(msg);
            $('#ajax').show();
        }
      });
      $.ajax({
  beforeSend: function(){
       $('#ajax').show()
    },
  complete: function(){
       $('#ajax').hide();
        $('.ubkm').hide();
  }
});
  
   });


    $(document).on('click','#ubkn',function(){
   $('.ubkm').hide();
   });

  $(document).on('click','#bronze',function(){
    $(".package").html('Bronze');
    $("#mymodal").css('z-index','300000');
  });
  $(document).on('click','#silver',function(){
    $(".package").html('Silver');
     $("#mysilver").css('z-index','300000');
  });
  $(document).on('click','#gold',function(){
    $(".package").html('Gold');
     $("#mygold").css('z-index','300000');
  });

 $(document).on('click','.calendar .day',function(){
    day_num = $(this).find('.dy').html();
     var pckg = $('.package').html();
     var href =$(this).parent().parent().find('.calprev').attr('href');
    var length=href.length;
   var href1=href.substring(0, 42);
   var year=href.substring(42, 47);
   var month = parseInt(href.substring(47, length))+1;
   var m=month.toString();
   var sess= "<?php echo $this->session->userdata('username');?>";

    var pckg = $('.package').html();

    if(sess!='')
    {
    if(m.length==1)
    {
    var url = href1+'cal'+"/"+year+"0"+m;
    }
    else
    {
       var url = href1+'cal'+"/"+year+m;
    }

    day_data = confirm("Book "+pckg+" package");

      if(day_data==true)
    {
      $.ajax({
        url:url,
        type:'POST',
        data:{
          day:day_num,
          data:pckg
        },
        success: function(msg)
        {
           $("#"+pckg).html(msg);
        }
      });
      $.ajax({
  beforeSend: function(){
       $('#ajax').show()
    },
  complete: function(){
       $('#ajax').hide();
  }
});
    }
    }
    else
    {
      $('#ajax').show();
      $("#messagem").html('<center><p class="text-info">You must login first to book a date</p></center>');
    }

  });


//reset password function
  $('#reset_btn').click(function(){
    var pass  =$('#mailpass').val();
    $.ajax({
        url:'<?php echo site_url("start/pwd");?>',
        type:'POST',
        data:{
          pass:pass,
        },
        success: function(msg)
        {
          $("#message").html("<h3 style='color:green'>"+msg+"</h3>");
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



// previous and next functions for calender
 $(document).on('click','.cal_nav',function(){
   var href= $(this).attr('href');

  var length=href.length;
   var href1=href.substring(0, 42);
   var date=href.substring(42, length);
    var pckg = $('.package').html();
    var url = href1+'cal'+"/"+date;
    $(this).attr('id','cal'+pckg);
   $.ajax({
        url:url,
        type:'POST',
        success: function(msg)
        {
          $("#"+pckg).html(msg);
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
