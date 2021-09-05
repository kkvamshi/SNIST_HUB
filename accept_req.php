
<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ID']) && isset($_POST['grpid'])){
	$grpid=$_POST['grpid'];
	echo $b1 =$_POST['check'];
include 'session.php';
require_once("connectionnn.php");
$sql="select * from `grouprequests` where group_id='$grpid' and req_to='$id'";
$res=$conn->query($sql);
if($res->num_rows > 0){
	if($b1 == "accept"){
	$row=$res->fetch_assoc();
	$req_by=$row['req_by'];
	$query = "insert into `group_members`(`group_id`,`member_id`) values('$grpid','$id')"; 
if($result = $conn->query($query))
	echo "You are added";
echo $conn->error;
$msg="<b>$req_by</b> added <b>$id</b>";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
    echo $conn->error;
	}
	else{
		echo "fucked here";
	}
	$sql="delete from `grouprequests` where group_id='$grpid' and req_to='$id'";
$res=$conn->query($sql);
}
}
?>