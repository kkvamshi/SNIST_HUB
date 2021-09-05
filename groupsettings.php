<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script>

    if(window==window.top){
	  window.location="home.php";
	}
	
	$(document).ready(function(){
		
	grpid =   $('#grppiid').val();
	gname =   $('#grppname').val();
	gtag =   $('#grpptag').val();
	gdesc =   $('#grppdesc').val();
	gadm =   $('#grppadm').val();
	if(gadm!='1'){
		
	$('#gnameedit').hide();
	$('#gtagedit').hide();
	$('#gdescedit').hide();
	}
	$('#editgname').hide();
		$('#gnamesave').hide();
	$('#gnameedit').click(function(){
	$('#editgname').show();
		$('#gnamesave').show();
		$('#gname').hide();
		$('#gnameedit').hide();
		$('#editedgname').val(gname);
	});
	$('#gnamesave').click(function(){
		var gname=$('#editedgname').val();
		$.ajax({
			url: 'gnameedit.php?grpid='+grpid+'&gname='+gname,
			success: function(data){
		$('#editgname').hide();
		$('#gnamesave').hide();
		$('#gname').show();
		$('#gnameedit').show();
				gname=data;
				$('#gname').html('<b>'+data+'</b>');
			},
			error: function(){} 	        
	   });
		
	});
			$('#editgtag').hide();
		$('#gtagsave').hide();
	$('#gtagedit').click(function(){
	$('#editgtag').show();
		$('#gtagsave').show();
		$('#gtag').hide();
		$('#gtagedit').hide();
		$('#editedgtag').val(gtag);
	});
	$('#gtagsave').click(function(){
		var gtag=$('#editedgtag').val();
		$.ajax({
			url: 'gtagedit.php?grpid='+grpid+'&gtag='+gtag,
			success: function(data){
		$('#editgtag').hide();
		$('#gtagsave').hide();
		$('#gtag').show();
		$('#gtagedit').show();
				gtag=data;
				$('#gtag').html('<b>'+data+'</b>');
			},
			error: function(){} 	        
	   });
		
	});
			$('#editgdesc').hide();
		$('#gdescsave').hide();
	$('#gdescedit').click(function(){
	$('#editgdesc').show();
		$('#gdescsave').show();
		$('#gdesc').hide();
		$('#gdescedit').hide();
		$('#editedgdesc').val(gdesc);
	});
	$('#gdescsave').click(function(){
		var gdesc=$('#editedgdesc').val();
		$.ajax({
			url: 'gdescedit.php?grpid='+grpid+'&gdesc='+gdesc,
			success: function(data){
		$('#editgdesc').hide();
		$('#gdescsave').hide();
		$('#gdesc').show();
		$('#gdescedit').show();
				gdesc=data;
				$('#gdesc').html('<b>'+data+'</b>');
			},
			error: function(){} 	        
	   });
		
	});
	
	$('#deleteg').click(function(){
			$.ajax({
			url: 'leavegroup.php?grpid='+grpid,
			success: function(data){
				$('#main').html('<center><h3>You have been left</h3></center>');
			},
			error: function(){} 	        
	   });
	});
});
</script>
</head>
<body height="90%">
<?php
if(isset($_GET["grpid"])){
	include 'session.php';
	include 'include.php';
	$gid=$_GET["grpid"];
$gindex=$grpindex["$gid"];
echo '<input type="hidden" id="grppiid" value="'.$gid.'">';
echo '<input type="hidden" id="grppname" value="'.$groups["$gindex"]["name"].'">';
echo '<input type="hidden" id="grpptag" value="'.$groups["$gindex"]["tag"].'">';
echo '<input type="hidden" id="grppdesc" value="'.$groups["$gindex"]["desc"].'">';
echo '<input type="hidden" id="grppadm" value="'.$groups["$gindex"]["admin"].'">';
	
	
?>
<div id="main" style="word-wrap: break-word;">

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="98%;" style="margin:auto; margin-top:5%;">
			<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Group Name
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div id="editgname" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" id="editedgname" type="text" id="sample3">
    <label class="mdl-textfield__label" for="sample3">Group Name</label>
  </div><div id="gname" ><b><?php echo $groups["$gindex"]["name"]; ?></b></div>
    <input id="gnameedit" style="float:right;" class="mdl-button mdl-js-button mdl-button--primary" type="button" value="Edit" name="edit">
    <input id="gnamesave" style="float:right;" class="mdl-button mdl-js-button mdl-button--primary" type="button" value="Save" name="save">
	</td></tr><tr><th  class="mdl-data-table__cell--non-numeric"  align="center">
Group TagLine
</th></tr>
	<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div id="editgtag" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" id="editedgtag" type="text" id="sample3">
    <label class="mdl-textfield__label" for="sample3">Tag Line</label>
  </div><div id="gtag" ><b><?php echo $groups["$gindex"]["tag"]; ?></b></div>
    <input id="gtagedit" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Edit" name="edit">
    <input id="gtagsave" class="mdl-button mdl-js-button mdl-button--primary"  style="float:right;" type="button" value="Save" name="save">
	</td></tr>
	<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Group Description
</th></tr>
	<tr><td class="mdl-data-table__cell--non-numeric" width="100%"  style="word-break: break-all; white-space: initial;"> <div id="editgdesc" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea class="mdl-textfield__input" id="editedgdesc" type="text" id="sample3"></textarea>
    <label for="sample3">Description</label>
  </div><div id="gdesc" class="mdl_list" ><b><?php echo $groups["$gindex"]["desc"]; ?></b></div>
    <input id="gdescedit" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Edit" name="edit">
    <input id="gdescsave" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Save" name="save">
	</td></tr>
	
</table><br></center><center>
<button id="deleteg" style=" width:90%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  Leave Group
</button>
</center>
	</div>
	<?php
}
?>
</body>
</html>