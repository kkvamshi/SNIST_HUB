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
	function checkForm(form){
			var f=0;
			
		if(form.new1.value == form.new2.value && form.new1.value!=""){
		    $.ajax({
				type:"POST",
			url: 'checkPWD.php',
			data:{
				pwd:form.old.value
			},
			async: false ,
			success: function(data){
			  f=data;
			},
			error: function(){} 	        
	   });
   if(f == 1){
       	$('#pwder').html("Password you entered is incorrect");
        return false;	
	}
	else{
		return true;
		
	}
	}
	else{
       		$('#pwder').html("Passwords not matched");
			return false;
	}
		return false;
	}
	$(document).ready(function(){
	$('#oldpwddiv').hide();
	$('#new1pwddiv').hide();
	$('#new2pwddiv').hide();
	$('#savepwd').hide();
	$('#switch-1').change(function(){
		var cs;
			if($('#switch-1').is(':checked')){
				cs=1;
				}
		else{
			cs=0;
		}
			$.ajax({
				type:"POST",
			url: 'cansee.php',
			data:{
				cs:cs
			},
			async: false ,
			success: function(data){
			},
			error: function(){} 	        
	   });
		
	});
		$('#switch-2').change(function(){
		var cs;
			if($('#switch-2').is(':checked')){
				cs=1;
				}
		else{
			cs=0;
		}
			$.ajax({
				type:"POST",
			url: 'canmsg.php',
			data:{
				cs:cs
			},
			async: false ,
			success: function(data){
			},
			error: function(){} 	        
	   });
		
	});
		$('#switch-3').change(function(){
		var cs;
			if($('#switch-3').is(':checked')){
				cs=1;
				}
		else{
			cs=0;
		}
			$.ajax({
				type:"POST",
			url: 'canadd.php',
			data:{
				cs:cs
			},
			async: false ,
			success: function(data){
			},
			error: function(){} 	        
	   });
		
	});
	$('#editpwd').click(function(){
		$('#editpwd').hide()
		$('#pwd').hide()
			$('#oldpwddiv').show();
	$('#new1pwddiv').show();
	$('#new2pwddiv').show();
	$('#savepwd').show();
		
	});
	});
</script>
</head>
<body height="90%">
<?php
include 'connectionnn.php';
	include 'session.php';	 
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{
	$sql = "SELECT * FROM $user where id='$id'";
     $result = $conn->query($sql);
	 $row = $result->fetch_assoc();
	 $m=$row["mobile"];
	 $e=$row["email"];
?>
<div id="main" style="word-wrap: break-word;">
<center><h4>Account Settings</h4></center>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="98%;" style="margin:auto; margin-top:5%;">
			<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Id
</th></tr>	<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $id; ?></b></div>
	</td></tr>		<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Password
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> 
<form action="pwdchange.php" method="post" target="_top" onsubmit="return checkForm(this)">
<div id="oldpwddiv" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" name="old" id="oldpwd" type="password" required id="sample3">
    <label class="mdl-textfield__label" for="sample3">Old Password</label>
  </div><p id="pwder" style="color:red;"></p>
  <div id="new1pwddiv" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" name="new1" id="new1pwd" type="password" pattern="[a-zA-Z0-9]{8,20}" id="sample3" required title="use only letters and numbers length 8 to 20 characters">
    <label class="mdl-textfield__label" for="sample3">New Password</label>
  </div>
  <div id="new2pwddiv" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" name="new2" id="nnew2pwd" type="password" pattern="[a-zA-Z0-9]{8,20}" required title="use only letters and numbers length 8 to 20 characters" id="sample3">
    <label class="mdl-textfield__label" for="sample3">Re-Enter New Password</label>
  </div>
  <div id="pwd" ><b>*********</b></div>
    <input id="editpwd" class="mdl-button mdl-js-button mdl-button--primary" style="float:right;" type="button" value="Change" name="edit">
    <input id="savepwd" class="mdl-button mdl-js-button mdl-button--primary"  style="float:right;" type="submit" value="Submit" name="save">
	<p id="pwder"></p>
	</form>
	</td></tr>	<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Mobile
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $m; ?></b></div>
	</td></tr>	<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Email
</th></tr>
<tr><td class="mdl-data-table__cell--non-numeric" style="word-break: break-all; white-space: initial;"> <div ><b><?php echo $e; ?></b></div>
	</td></tr>	<tr><th class="mdl-data-table__cell--non-numeric" align="center">
Privacy
</th></tr>
		<tr><td style="word-break: break-all; white-space: initial;">
	<b style="float:left; word-break: break-all; white-space: initial;">Anyone can see your mobile number and Email</b><div style="float:right;">
	<label  class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
	<?php
	if($row["can_see"])
		echo '<input type="checkbox" id="switch-1" class="mdl-switch__input" checked>';
	else
		echo '<input type="checkbox" id="switch-1" class="mdl-switch__input">';
	?>
  <span class="mdl-switch__label"></span>
</label></div>
</td>
	</tr>
	<tr><td style="word-break: break-all; white-space: initial;">
	<b style="float:left; word-break: break-all; white-space: initial;">Anyone can send you message</b><div style="float:right;">
	<label  class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
	<?php
	if($row["can_msg"])
		echo '<input type="checkbox" id="switch-2" class="mdl-switch__input" checked>';
	else
		echo '<input type="checkbox" id="switch-2" class="mdl-switch__input">';
	?>
  <span class="mdl-switch__label"></span>
</label></div>
</td>
	</tr>
		<tr><td style="word-break: break-all; white-space: initial;">
	<b style="float:left; word-break: break-all; white-space: initial;">Anyone can add you into group</b><div style="float:right;">
	<label  class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-3">
	<?php
	if($row["can_add"])
		echo '<input type="checkbox" id="switch-3" class="mdl-switch__input" checked>';
	else
		echo '<input type="checkbox" id="switch-3" class="mdl-switch__input">';
	?>
  <span class="mdl-switch__label"></span>
</label></div>
</td>
	</tr>

</table><br></center>
	</div>
<?php
}
?>

<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:60px; padding-top:15px; width:100%; position:relative; float:left; top:30px;">
<center>Developed by Balram Mitta</center></div>
</body>
</html>