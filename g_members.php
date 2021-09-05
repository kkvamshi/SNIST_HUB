<?php if(isset($_GET['grpid'])){ 
$grpid=$_GET['grpid'] ?>
<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script>
function remmem(mid){
	var grpid =   $('#grppiid').val();
$(document).ready(function(){
	$.ajax({
		type: "GET",
		url: "remmem.php?grpid="+grpid+"&mid="+mid,
		beforeSend: function(){
		},
		success: function(data){
			$('#'+mid).hide();
		}
	});
});
}
function remadm(mid){
	var grpid =   $('#grppiid').val();
$(document).ready(function(){
	$.ajax({
		type: "GET",
		url: "remadm.php?grpid="+grpid+"&mid="+mid,
		beforeSend: function(){
		},
		success: function(data){
			location.reload();
		}
	});
});
}
function addadm(mid){
	var grpid =   $('#grppiid').val();
$(document).ready(function(){
	$.ajax({
		type: "GET",
		url: "addadm.php?grpid="+grpid+"&mid="+mid,
		beforeSend: function(){
		},
		success: function(data){
			location.reload();
		}
	});
});
}
$(document).ready(function(){
	var grpid =   $('#grppiid').val();
			$("#ms_list").hide();
	$("#searchinput").keyup(function(){
		var l=$(this).val().length;
		var v=$(this).val();
	if(l > 2 ){
		$.ajax({
		type: "POST",
		url: "searchgroup.php?grpid="+grpid,
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
			$("#m_list").hide();
			$("#ms_list").show();
			$("#ms_list").html(fdata);
			componentHandler.upgradeDom();
		}
		});
	}
	else{
			$("#ms_list").hide();
			$("#m_list").show();
	}
	});
	function start1(){
	$.ajax({
			url: "totgmembers.php?grpid="+grpid,
			success: function(data){
			$("#searchinput").attr("placeholder",data);
			},
			error: function(){} 	        
	   });
	}
	start1();
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
		  if ($(window).scrollTop() > 650*($(document).height()/670-1)){
			    f=0;
				if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('m-list.php?page='+pagenum+'&posts='+posts+'&grpid='+grpid);
			    else
				getresult('m-list.php?page='+pagenum+'&posts='+posts);
					
			}
		  }
		}
	});
});
</script>
 <link rel="stylesheet" type="text/css" href="css/gmems.css">
</head>
<body> 
 <?php
echo '<input type="hidden" id="grppiid" value="'.$grpid.'">';
?>
<div>
<input type="text" id="searchinput" placeholder="" name="sinput">
</div>
<div id="m_list">
<?php include 'm-list.php'; ?>
</div>
<div id="ms_list">
<?php include 'm-list.php'; ?>
</div>
</body>
</html>
<?php } ?>