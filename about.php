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
		
	proid =   $('#proid').val();
	pname =   $('#proname').val();
	ptag =   $('#protag').val();
	pdesc =   $('#prodesc').val();
	puser =   $('#prouser').val();
	mine =   $('#mine').val();
	if(mine!='1'){
		
	$('#pnameedit').hide();
	$('#ptagedit').hide();
	$('#pdescedit').hide();
	}
	$('#editpname').hide();
		$('#pnamesave').hide();
	$('#pnameedit').click(function(){
	$('#editpname').show();
		$('#pnamesave').show();
		$('#pname').hide();
		$('#pnameedit').hide();
		$('#editedpname').val(pname);
	});
	$('#pnamesave').click(function(){
		var pname=$('#editedpname').val();
		$.ajax({
			url: 'pnameedit.php?proid='+proid+'&pname='+pname+'&puser='+puser,
			success: function(data){
		$('#editpname').hide();
		$('#pnamesave').hide();
		$('#pname').show();
		$('#pnameedit').show();
				pname=data;
				$('#pname').html('<b>'+data+'</b>');
			},
			error: function(){} 	        
	   });
		
	});
			$('#editptag').hide();
		$('#ptagsave').hide();
	$('#ptagedit').click(function(){
	$('#editptag').show();
		$('#ptagsave').show();
		$('#ptag').hide();
		$('#ptagedit').hide();
		$('#editedptag').val(ptag);
	});
	$('#ptagsave').click(function(){
		var ptag=$('#editedptag').val();
		$.ajax({
			url: 'ptagedit.php?proid='+proid+'&ptag='+ptag+'&puser='+puser,
			success: function(data){
		$('#editptag').hide();
		$('#ptagsave').hide();
		$('#ptag').show();
		$('#ptagedit').show();
				ptag=data;
				$('#ptag').html('<b>'+data+'</b>');
			},
			error: function(){} 	        
	   });
		
	});
			$('#editpdesc').hide();
		$('#pdescsave').hide();
	$('#pdescedit').click(function(){
	$('#editpdesc').show();
		$('#pdescsave').show();
		$('#pdesc').hide();
		$('#pdescedit').hide();
		$('#editedpdesc').val(pdesc);
	});
	$('#pdescsave').click(function(){
		var pdesc=$('#editedpdesc').val();
		$.ajax({
			url: 'pdescedit.php?proid='+proid+'&pdesc='+pdesc+'&puser='+puser,
			success: function(data){
		$('#editpdesc').hide();
		$('#pdescsave').hide();
		$('#pdesc').show();
		$('#pdescedit').show();
				pdesc=data;
				$('#pdesc').html('<b>'+data+'</b>');
			},
			error: function(){} 	        
	   });
		
	});
	
	$('#deleteg').click(function(){
			$.ajax({
			url: 'leavegroup.php?proid='+proid,
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
include 'connectionnn.php';
	include 'session.php';	 
	if(isset($_GET['pro_id']))
  {
	 $a=$_GET['pro_id'];
     $sql = "SELECT * FROM students where id='$a'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	  $pro_id=$a;
	  $pro_nn=$row['nickname'];
	  $pro_n=$row['name'];
	  $pro_g=$row['gender'];
	  $pro_b=$row['branch'];
	  $pro_y=$row['year'];
	  $pro_url=$row['url'];
	  $pro_tag=$row['utag'];
	  $pro_mail=$row['email'];
	  $pro_mob=$row['mobile'];
	  $pro_cc=$row['can_see'];
	  $pro_desc=$row['udesc'];
	  $pro_user='Student';
} else {
$sql = "SELECT * FROM staff where id='$a'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	  $pro_id=$a;
	  $pro_nn=$row['nickname'];
	  $pro_n=$row['name'];
	  $pro_g=$row['gender'];
	  $pro_b=$row['branch'];
	  $pro_url=$row['url'];
	  $pro_mail=$row['email'];
	  $pro_mob=$row['mobile'];
	  $pro_tag=$row['utag'];
	  $pro_desc=$row['udesc'];
	  $pro_cc=$row['can_see'];
	  $pro_user='Staff';
}
else{
     $sql = "SELECT * FROM clubs where id='$a'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	  $pro_id=$a;
	  $pro_n=$row['name'];
	  $pro_nn=$row['nickname'];
	  $pro_url=$row['url'];
	  $pro_tag=$row['utag'];
	  $pro_desc=$row['udesc'];
	  $pro_mail=$row['email'];
	  $pro_mob=$row['mobile'];
	  $pro_cc=$row['can_see'];
	  $pro_user='Club';
}
	
}
}
echo '<input type="hidden" id="myid" value="'.$id.'">';
echo '<input type="hidden" id="proid" value="'.$pro_id.'">';
echo '<input type="hidden" id="proname" value="'.$pro_n.'">';
echo '<input type="hidden" id="prouser" value="'.$pro_user.'">';
echo '<input type="hidden" id="protag" value="'.$pro_tag.'">';
echo '<input type="hidden" id="prodesc" value="'.$pro_desc.'">';
echo '<input type="hidden" id="pronn" value="'.$pro_nn.'">';
if($pro_user!='Club'){
echo '<input type="hidden" id="pronn" value="'.$pro_nn.'">';
echo '<input type="hidden" id="prob" value="'.$pro_b.'">';
}
if($pro_user=='Student')
echo '<input type="hidden" id="proy" value="'.$pro_y.'">';
	if($id==$pro_id||$id=='admin')
echo '<input type="hidden" id="mine" value="1">';
	
?>
<div id="main" style="word-wrap: break-word;">

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="98%;" style="margin:auto; margin-top:5%;">
		<tr><td  align="center">
<h4><?php echo $pro_user; ?></h4>
</td></tr>	<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Id
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $pro_id; ?></b></div>
	</td></tr><tr><th class="mdl-data-table__cell--non-numeric" align="center">
Name
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $pro_n; ?></b></div>
	</td></tr>
<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Nick Name
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div id="editpname" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" id="editedpname" type="text" id="sample3">
    <label class="mdl-textfield__label" for="sample3">Enter Nick Name</label>
  </div><div id="pname" ><b><?php echo $pro_nn; ?></b></div>
    <input id="pnameedit" style="float:right;" class="mdl-button mdl-js-button mdl-button--primary" type="button" value="Edit" name="edit">
    <input id="pnamesave" style="float:right;" class="mdl-button mdl-js-button mdl-button--primary" type="button" value="Save" name="save">
	</td></tr><tr><th  class="mdl-data-table__cell--non-numeric"  align="center">
TagLine
</th></tr>
	<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div id="editptag" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" id="editedptag" type="text" id="sample3">
    <label class="mdl-textfield__label" for="sample3">TagLine</label>
  </div><div id="ptag" ><b><?php echo $pro_tag; ?></b></div>
    <input id="ptagedit" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Edit" name="edit">
    <input id="ptagsave" class="mdl-button mdl-js-button mdl-button--primary"  style="float:right;" type="button" value="Save" name="save">
	</td></tr>
	<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Description
</th></tr>
	<tr><td class="mdl-data-table__cell--non-numeric" width="100%"  style="word-break: break-all; white-space: initial;"> <div id="editpdesc" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea class="mdl-textfield__input" id="editedpdesc" type="text" id="sample3"></textarea>
    <label for="sample3">Describe Yourself</label>
  </div><div id="pdesc" class="mdl_list" ><b><?php echo $pro_desc; ?></b></div>
    <input id="pdescedit" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Edit" name="edit">
    <input id="pdescsave" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Save" name="save">
	</td></tr>
	<?php 
if($pro_user!='Club'){ ?>
	<tr class="branch" ><th class="mdl-data-table__cell--non-numeric" align="center">
Branch
</th></tr>
<tr class="branch" ><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $pro_b; ?></b></div>
	</td></tr>
	<?php
}

if($pro_user=='Student'){
?><tr ><th class="mdl-data-table__cell--non-numeric" align="center">
Year
</th></tr>
<tr ><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $pro_y; ?></b></div>
	</td></tr>
<?php
}
if($pro_cc==1||$pro_id==$id||$id=='admin'){
?>
<tr ><th class="mdl-data-table__cell--non-numeric" align="center">
Mobile
</th></tr>
<tr  ><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $pro_mob; ?></b></div>
	</td></tr><tr class="year" ><th class="mdl-data-table__cell--non-numeric" align="center">
Gmail
</th></tr>
<tr ><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $pro_mail; ?></b></div>
	</td></tr>
<?php
}
?>
</table><br></center>
<?php
if($id!=$pro_id){
?>
<center>
<h3>Report User</h3>
<form action="report_user.php" method="post">
<input type="hidden" value="<?php echo $pro_id; ?>" name="pro_id">
<textarea style="width:90%;  height:100px;" name="reason" placeholder="Type Reasons for Reporting"></textarea><br><br>
<button id="reportp" style=" width:90%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  Report
</button>
</form>
</center>

<?php
}
if($id=='admin'){
?>
	<center><form action="report_user.php" method="post">
<input type="hidden" value="<?php echo $pro_id; ?>" name="pro_id">
<button id="reportp" style=" width:90%;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
  REMOVE
</button>
</form></center>
	<?php
}
  }
?>
</div>
</body>
</html>