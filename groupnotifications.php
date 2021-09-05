<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<link rel="stylesheet" href="css/notify.css">
<script src="mdl/material.min.js"></script>
<script>
  if(window==window.top){
	  window.location="home.php";
	}
	
</script>
 </head>
  <body>
  <div id="full">
<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ID'])){
include 'session.php';
require_once("connectionnn.php");
$grpid=$_GET['grpid'];
 $sql="select * from groupnotifications where group_id='$grpid' order by time desc";
 $res=$conn->query($sql);
 if($res->num_rows > 0){
	
	 while($row = $res->fetch_assoc()){
		 $msg=$row['msg'];
		 echo '<div class="greq mdl-js-ripple-effect">
		 <div class="grmsg">'.ucfirst($msg).'</div>
		 <span class="mdl-ripple"></span>
		 </div>';
	 }
}
 else
 echo '<div id="ghead" style="color:#d1d1d1;"><center><h5>No new Notifications</h5></center></div>';
 ?>
	</div>
	<?php
}
	?>
	
<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:30px; padding-top:15px; width:100%; position:fixed; bottom:0;">
<center>Developed by Balram Mitta</center></div>
</body>
  </html>
  