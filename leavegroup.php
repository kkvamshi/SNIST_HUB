<?php
include 'session.php';
require_once("connectionnn.php");
$grpid=$_GET["grpid"];
$sql = "delete from group_members where group_id='$grpid' and member_id='$id'";
$res = $conn->query($sql);

$msg="<b>$nn</b> left group";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
$sql3 = "select * from group_members where group_id='$grpid'";
$res3 = $conn->query($sql3);
if($res3->num_rows>0){
$sql1 = "select * from group_members where group_id='$grpid' and admin=1";
$res1 = $conn->query($sql1);	
	if(!$res1->num_rows){
		   $row3 = $res3->fetch_assoc();
		   $nextadm= $row3["member_id"];
           $sql2 = "update group_members set admin=1 where group_id='$grpid' and member_id='$nextadm'";
           $res2 = $conn->query($sql2);
	}
	
}
else{
	
$sql4 = "select * from `groupposts` where group_id='$grpid'";
$res4 = $conn->query($sql4);
while($row4 = $res4->fetch_assoc())
if($row4["post_loc"]!="")
	unlink($row4["post_loc"]);
unlink('groups/'.$grpid.'pro.jpg');
unlink('groups/'.$grpid.'cover.jpg');
$sql5 = "delete from groups where group_id='$grpid'";
$res5 = $conn->query($sql5);	
}

?>