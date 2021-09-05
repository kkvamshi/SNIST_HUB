<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
 <link rel="stylesheet" type="text/css" href="css/gmems.css">
<script src="mdl/material.min.js"></script>
<script>
$(document).ready(function(){
	var f=1;
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
			$("#posts_display_area").append(data);
			componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
	$(window).scroll(function(){
		if(f==1){
		  if ( $(window).scrollTop() > 650*($(document).height()/670-1)){
			    f=0;
				if(Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('s-list.php?page='+pagenum+'&posts='+posts);
			    else
				getresult('s-list.php?page='+pagenum+'&posts='+posts);
					
			}
		  }
		}
	});
	$('#sm_list').hide();
	
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
	$('#m_list').hide();
	$('#sm_list').show();
			$("#sm_list").html(fdata);
			componentHandler.upgradeDom();
		}
		});
	}
	else{
	$('#m_list').show();
	$('#sm_list').hide();
	}
	});
});

	function addnew(){
		$(document).ready(function(){
			window.location="addsubject.php";
		});
	}
</script>
 </head>
  <body>
  <?php
  include 'session.php';
  ?>
<div>
<input type="text" id="searchinput" placeholder="Search Subject" name="sinput">
</div>
<div id="m_list">
<?php include 's-list.php'; 
error_reporting(0);?>
</div>
<div id="sm_list">
</div>

<?php
if($user=='staff'||$user=='admin'){ 
	echo '<button id="addnn" onclick="addnew()" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
  <i class="material-icons">add</i>
</button>';
 }

?>
	  <div id="foot" style="background-color:#222244; color:white; font-size:18px; height:40px; padding-top:15px; width:100%; position:relative; top:20px;">
<center>Developed by Balram Mitta</center>

</div>
</body>
  </html>
  