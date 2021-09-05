<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
 <link rel="stylesheet" type="text/css" href="css/gmems.css">
<script src="mdl/material.min.js"></script>
<script>
function delete1(pid,location){	
		$(document).ready(function(){
			if(confirm("If you delete,Your post won't be recovered again")){
	var pro_id =   $('#proid').val();
		    $.ajax({
			url: 'notesdelete.php?pid='+pid+'&loc='+location,
			success: function(data){
				$('#'+pid).html('Deleted');
			},
			error: function(){} 	        
	   });
			}
		});
	}
$(document).ready(function(){
	var f=1;
			$('#loader-icon').hide();
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
			$("#m_list").append(data);
			componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
	var sub =   $('#subb').val();
	$(window).scroll(function(){
		if(f==1){
		  if ($(window).scrollTop() > 650*($(document).height()/670-1)){
			    f=0;
				if(Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var posts = parseInt($(".posts:first").val());
				getresult('sn-list.php?page='+pagenum+'&posts='+posts+'&sub='+sub);
					
			}
		  }
		}
	});
	
	
	$("#searchinput").keyup(function(){
		var l=$(this).val().length;
		var v=$(this).val();
	if(l > 1 ){
		$.ajax({
		type: "POST",
		url: "searchsubject.php",
		data:'key='+$(this).val(),
		beforeSend: function(){
		},
		success: function(data){
			var fdata='';
			var d1;
			var d2;
			var d3;
			var d4;
			var d5;
			fdata=data;
			d1=fdata.replace('#$$$#','###').split('###');
			while(d1[1]){
			d2=d1[1].replace('#^^^#','###').split('###');
			d4=v.toLowerCase();
			d5=d2[0].toLowerCase();
			if(d5==d4){
			fdata=d1[0]+'<span style="color:blue;">'+d5+'</span>'+d2[1];
			}
			else{
			d3=d5.split(d4);
			if(d3[1]||d3[1]=='')
			fdata=d1[0]+d3[0]+'<span style="color:blue;">'+v+'</span>'+d3[1]+d2[1];
		    else{
			fdata=d1[0]+d2[0]+d2[1];
			}
			}
			d1=fdata.replace('#$$$#','###').split('###');
			}
			$("#m_list").html(fdata);
			componentHandler.upgradeDom();
		}
		});
	}
	else{
	}
	});
});

	function addnew(){
		$(document).ready(function(){
	var sub =   $('#subb').val();
			window.location="addnewnotes.php?sub="+sub;
		});
	}                                 
</script>
 </head>
  <body>
  <?php
error_reporting(0);
  include 'session.php';
  if(isset($_GET["sub"])){
	  $sub=$_GET["sub"];
echo '<input type="hidden" id="subb" value="'.$sub.'">';
	  ?>
	  <center><h5><?php echo $sub; ?> Notes</h5></center>
<div id="m_list">
<?php include 'sn-list.php'; ?>
</div>

<?php
if($user=='staff'||$user=='admin'){ 
	echo '<button id="addnn" onclick="addnew()" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
  <i class="material-icons">add</i>
</button>';
 }
  }
?>
	  <div id="loader-icon"><div></div></div>
	  <div id="foot" style="background-color:#222244; color:white; font-size:18px; height:40px; padding-top:15px; width:100%; position:relative; top:20px;">
<center>Developed by Balram Mitta</center>

</div>
</body>
  </html>
  