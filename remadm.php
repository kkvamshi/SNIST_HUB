<?php
include 'session.php';
require_once("connectionnn.php");
if(isset($_GET['grpid'])&&isset($_GET['mid'])){ 
$grpid=$_GET['grpid'];
$mid=$_GET['mid'];
 $sql2 = "update group_members set admin=0 where group_id='$grpid' and member_id='$mid'";
 $res2 = $conn->query($sql2);
echo $conn->error;

		 $prosql="select nickname,url from `students` where id='$mid'
		 union
		 select nickname,url from `clubs` where id='$mid'
		 union
		 select nickname,url from `staff` where id='$mid'";
		 $respro=$conn->query($prosql);
		 $rowpro = $respro->fetch_assoc();
		 $conn->error;
		 $nname=$rowpro['nickname'];
$msg="<b>$nn</b> removed <b>$nname</b> as admin";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
}
?>