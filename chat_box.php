<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<link rel="stylesheet" href="css/chat-box.css">
<script src="mdl/material.min.js"></script>
<script>
  if(window==window.top){
	  window.location="home.php";
	}
	

function deletechat(){
	var pro_id =   $('#proid').val();
	  $.ajax({
				type: 'POST' ,
			url: 'deletechat.php',
			data : {
				proid : pro_id
			},
			success: function(data){
				$('#marea').html('<input type="hidden" class="nmsgs" value="0" />');
			}
			});
	
}

$(document).ready(function(){
	
				$('#marea').scrollTop($("#marea")[0].scrollHeight);
				$('.time').show();
				$(document).on('click','.msgbox',function(){
				$('.time').css('height','0');
				if($(this).find('.time').height() === 0 ){
				var dt1=new Date();
				var dt2=new Date($(this).find('.msgtime').html());
				var time=(dt1-dt2)/1000;
				var temp;
				var timestr;
				var d=time/(3600*24);
				var h=time%(3600*24);
				temp=h;
				h=h/3600;
				var m=temp%3600;
				temp=temp;
				m=m/60;
				s=temp%60;
				if(parseInt(d) > 0)
					timestr=parseInt(d)+' days ago';
				else
					if(parseInt(h) > 0)
						timestr=parseInt(h)+' hours ago';
					else
						if(parseInt(m) > 0)
							timestr=parseInt(m)+' minutes ago';
						else
							timestr=parseInt(s)+' seconds ago';
				$(this).find('.time').html(timestr);
				var pheight=$("#marea")[0].scrollHeight;
					$(this).find('.time').css('height','18px');
				var pscroll=$("#marea").scrollTop();
				var nheight=$("#marea")[0].scrollHeight;
				$("#marea").scrollTop(nheight-pheight+pscroll);
				}
				else
					$(this).find('.time').css('height','0');
				});
				
	var f=1;
	$("#msg").keyup(function(){
	var msg=$('#msg').val();
	if(msg.length < 1)
			$('#send').css('background-color','#d1d1d1');
	else
			$('#send').css('background-color','#33335d');
		
	});
	function checkstatus(){
	 $.ajax({
				type: 'POST' ,
			url: 'checkmsgstatus.php',
			data : {
				proid : pro_id 
			},
			async:false ,
			success: function(data){
				if(data=='seen'){
					$('.sentmsg').filter('.sent').css('background-color','rgba(180,240,180,1)').removeClass('sent').addClass('seen');
					$('.sentmsg').filter('.del').css('background-color','rgba(180,240,180,1)').removeClass('del').addClass('seen');
				}
				else if(data=='delivered'){
					$('.sentmsg').filter('.sent').css('background-color','#ffffff').removeClass('sent').addClass('del');
				}
				else{
				}
			}
			});
	}
	
	setInterval(checkstatus,3000);
	setInterval(newmsgs,3000);
	function newmsgs(){
		var msgs = parseInt($(".nmsgs:last").val());
	var pronn =   $('#pronn').val();
		    $.ajax({
				type: 'POST' ,
			url: 'getnewmsgs.php',
			data : {
				proid : pro_id ,
				msgs : msgs,
				pname : pronn
			},
			async:false ,
			success: function(data){
				var pheight=$("#marea")[0].scrollHeight;
				$('#marea').append(data);
				var pscroll=$("#marea").scrollTop();
				var nheight=$("#marea")[0].scrollHeight;
				$("#marea").scrollTop(nheight-pheight+pscroll);
				
			}
			});
	}
	
	$('#back').click(function(){
		
		window.location='messages.php';
	});
	$('#send').click(function(){
	var pro_id =   $('#proid').val();
	var msg=$('#msg').val();
	if(msg.length > 0 ){
	$('#msg').val("");
			$('#send').css('background-color','#d1d1d1');
		    $.ajax({
				type: 'POST' ,
			url: 'sendnewmsg.php',
			async:false,
			data : {
				proid : pro_id ,
				msg : msg 
			},
			success: function(data){
				newmsgs();
				$('#marea').scrollTop($("#marea")[0].scrollHeight);
			}
			});
		}
	});
function getresult(url) {
		$.ajax({
			url: url,
			beforeSend: function(){
			$('#loader-icon').show();
			$(window).scroll(function(){});
			},
			complete: function(){
			$('#loader-icon').hide();
			f=1;
			},
			success: function(data){
		    var pheg=$("#marea")[0].scrollHeight;
			var heg=$("#marea").prepend(data);
			$('#marea').scrollTop($("#marea")[0].scrollHeight-pheg)
			componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
	var pro_id =   $('#proid').val();
	var pronn =   $('#pronn').val();
	$('#marea').scroll(function(){
		if(f==1){
		  if ($('#marea').scrollTop() == 0 ){
			    f=0;
				if($(".pagenum:first").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:first").val()) + 1;
				var msgs = parseInt($(".msgs:last").val());
				getresult('message_box.php?page='+pagenum+'&msgs='+msgs+'&proid='+pro_id+'&pname='+pronn);
					
			}
		  }
		}
	});

});
</script>
 </head>
  <body>
  <?php
  if(isset($_GET['proid'])){
  $pro_id=$_GET['proid'];
  $pname=$_GET['pname'];
  echo '<input type="hidden" value="'.$pro_id.'" id="proid">';
  echo '<input type="hidden" value="'.$pname.'" id="pronn">';
  $sql1="";
  ?>
<div id="full">
  <div id="mhead"> <button id="back"
        class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect">
  <i class="material-icons">arrow_back</i>
</button> <div id="name"><?php echo ucfirst($pname); ?> </div>
  <button id="menu"
        class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect">
  <i class="material-icons">more_vert</i>
</button>
<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="menu">
<li class="mdl-menu__item" onclick="deletechat()" ><span>Delete Chat</span></li>
<ul>
</div>
  <div id="marea">  
   <?php include 'message_box.php'; ?>
  </div>
  <div id="mfoot"> 
  <input type="text" name="msg" id="msg" placeholder="Type your message" >
  
    <button id="send"
        class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
  <i class="material-icons">send</i>
</button>
  </div>
  </div>
  
  <?php
	}
  ?>
</body>
  </html>