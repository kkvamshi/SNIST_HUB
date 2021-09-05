<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
 <link rel="stylesheet" type="text/css" href="css/gmems.css">
<script src="mdl/material.min.js"></script>
<script>
$(document).ready(function(){
	var grpid =   $('#grppiid').val();
	$("#searchinput").keyup(function(){
		var l=$(this).val().length;
		var v=$(this).val();
	if(l > 2 ){
		$.ajax({
		type: "POST",
		url: "searchtoadd.php?grpid="+grpid,
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
		$("#m_list").html("");
	}
	});
});
function addmem(mid){
$(document).ready(function(){
	var grpid =   $('#grppiid').val();
	$.ajax({
		type: "GET",
		url: "addmem.php?grpid="+grpid+"&mid="+mid,
		beforeSend: function(){
		},
		success: function(data){
			$('#'+mid).hide();
		}
	});
});
}
</script>
 </head>
  <body>
  <?php
  if(isset($_GET['grpid'])){ 
$grpid=$_GET['grpid'];
echo '<input type="hidden" id="grppiid" value="'.$grpid.'">';
?>
<div>
<input type="text" id="searchinput" placeholder="Search with ID,Name" name="sinput">
</div>
<div id="m_list">
<div style="font-size:48px; color:#777777; text-border:3px ridge; position:relative; top:100; text-align:center; display:block; line-height:50px;">Search Results Here</div>
</div>
<?php } ?>
</body>
  </html>
  