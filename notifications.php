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
	


function acceptrej(grpid,aorr){
$(document).ready(function(){
    $.ajax({
				type: 'POST' ,
			url: 'accept_req.php',
			data : {
				grpid : grpid ,
				check:aorr
			},
			success: function(data){
				if(aorr=='accept')
				$('#'+grpid).html("<center>You are Added to the group</center>");
			else
				$('#'+grpid).html("<center>Request Deleted</center>");
				
			}
		});
});
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
 $sql="select * from grouprequests where req_to='$id' order by time desc";
 $res=$conn->query($sql);
 if($res->num_rows > 0){
	 echo '<div id="ghead"><center><h5>Group Requests</h5></center></div>';
	 while($row = $res->fetch_assoc()){
		$grpid=$row['group_id'];
		$req_by=$row['req_by'];
		$sql123="select * from groups where group_id='$grpid'";
		$res123=$conn->query($sql123);
		$row123 = $res123->fetch_assoc();
		$gname=$row123['group_name'];
		 $prosql="select nickname,url from `students` where id='$req_by'
		 union
		 select nickname,url from `clubs` where id='$req_by'
		 union
		 select nickname,url from `staff` where id='$req_by'";
		 $respro=$conn->query($prosql);
		 $rowpro = $respro->fetch_assoc();
		 $conn->error;
		 $nname=$rowpro['nickname'];
	 echo '<div id="'.$grpid.'" class="greq">
	      <div class="grmsg"><a href="profile.php?pro_id='.$req_by.'"><i>'.$nname.'</i></a> requested you to join group <i>'.$gname.'</i></div>
		  <div class="ar"><button onclick=acceptrej("'.$grpid.'","b") class="reject mdl-button mdl-js-button mdl-js-ripple-effect">
  Reject
</button>
		  <button onclick=acceptrej("'.$grpid.'","accept") class="accept mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Accept
</button></div></div>';
	 }
 }
 $sql="select * from notifications where to_id='$id' order by time desc";
 $res=$conn->query($sql);
	 echo '<div id="ghead"><center><h5>Notifications</h5></center></div>';
 if($res->num_rows > 0){
	
	 while($row = $res->fetch_assoc()){
		 $msg=$row['msg'];
		 $nurl=$row['nurl'];
		 echo '<div class="greq mdl-js-ripple-effect"><a href="'.$nurl.'">
		 <div class="grmsg">'.ucfirst($msg).'</div>
		 <span class="mdl-ripple"></span>
		 </a>
		 </div>';
	 }
}
 else
 echo '<div id="ghead" style="color:#d1d1d1;"><center><h5>No new Notifications</h5></center></div>';
 ?>
	</div>
	<?php
	
 $sql="delete from notifications where to_id='$id'";
 $res=$conn->query($sql);
}
	?>
	
<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:30px; padding-top:15px; width:100%; position:fixed; bottom:0;">
<center>Developed by Balram Mitta</center></div>
</body>
  </html>
  