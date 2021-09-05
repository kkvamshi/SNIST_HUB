<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<link rel="stylesheet" href="css/notify.css">
<script src="mdl/material.min.js"></script>
<script>
function arc(proid,aorr){
$(document).ready(function(){
    $.ajax({
				type: 'POST' ,
			url: 'msgrequest_arc.php',
			data : {
				proid : proid ,
				check:aorr
			},
			success: function(data){
				location.reload();
			}
		});
});
}


$(document).ready(function(){
setInterval(function(){
	location.reload();
},6000);
});
function openmsgs(proid,pname){
	window.location='chat_box.php?proid='+proid+'&pname='+pname;
}
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
 $sql="select * from messagerequests where req_to='$id'";
 $res=$conn->query($sql);
 if($res->num_rows > 0){
	 echo '<div id="ghead"><center><h5>Message Requests</h5></center></div>';
	 while($row = $res->fetch_assoc()){
		$req_by=$row['req_by'];
		 $prosql="select nickname,url from `students` where id='$req_by'
		 union
		 select nickname,url from `clubs` where id='$req_by'
		 union
		 select nickname,url from `staff` where id='$req_by'";
		 $respro=$conn->query($prosql);
		 $rowpro = $respro->fetch_assoc();
		 $conn->error;
		 $nname=$rowpro['nickname'];
	 echo '<div id="'.$req_by.$req_to.'" class="greq">
	      <div class="grmsg"><a href="profile.php?pro_id='.$req_by.'"><i>'.ucfirst($nname).'</i></a> sent you message request</div>
		  <div class="ar">
		  <button onclick=arc("'.$req_by.'","reject") class="reject mdl-button mdl-js-button mdl-js-ripple-effect">
  Reject
</button>
		  <button onclick=arc("'.$req_by.'","accept") class="accept mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Accept
</button>
</div>

</div>';
	 }
 }
 
 $sql="
 select * from messages m1 
JOIN 
( 
    select max(time) as time,user from 
    ( 
        select user2 as user,max(time) as time from `messages` where user1='$id' 
        group by user2 
        union 
        select user1 as user,max(time) as time from `messages` where user2='$id' 
        group by user1 
    ) as t 
    group by user 
    order by time desc
) m2 
on 
(m1.user1=m2.user and m1.user2='$id' and m1.time=m2.time) 
OR 
(m1.user2=m2.user and m1.user1='$id' and m1.time=m2.time)
 order by m1.time desc
 ";
 $res=$conn->query($sql);
 echo $conn->error;
	 echo '<div id="ghead"><center><h5>Messages</h5></center></div>';
 if($res->num_rows > 0){
	
	 while($row = $res->fetch_assoc()){
		 $proid=$row['user'];
		 $user1=$row['user1'];
		 $msg=$row['msg'];
		 $prosql="select nickname,url from `students` where id='$proid'
		 union
		 select nickname,url from `clubs` where id='$proid'
		 union
		 select nickname,url from `staff` where id='$proid'";
		 $respro=$conn->query($prosql);
		 $rowpro = $respro->fetch_assoc();
		 $conn->error;
		 $nname=$rowpro['nickname'];
		 $prourl=$rowpro['url'];
		 $status=$row['status'];
		 $colr='black';
		 if($user1==$proid){
			$lmsg=$nname;
			if($status!='seen'){
				$colr='blue';
			}
		 }
		 else
			$lmsg='you';
		 echo '
		 <div class="membox" onclick=openmsgs("'.$proid.'","'.$nname.'") >
		 <div class="mdl-js-ripple-effect">
			<div class="memimg"><img src="'.$prourl.'" ></div>
			<div class="memnm" style="color:'.$colr.';">
			<div class="memname">'.ucfirst($nname).'</div>
			<div class="memmsg">'.$lmsg.' : '.$msg.'</div>
			</div><span class="mdl-ripple"></span>
		 </div>
		 </div>';
	 }
	 
$sql="update messages set status='delivered' where user2='$id' and status='sent' ";
$conn->query($sql);
}
 else
 echo '<div id="ghead" style="color:#d1d1d1;"><center><h5>No Messages</h5></center></div>';
 ?>
 
	</div>
	<?php
}
	?>
<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:30px; padding-top:15px; width:100%; position:fixed; bottom:0;">
<center>Developed by Balram Mitta</center></div>
</body>
  </html>
  