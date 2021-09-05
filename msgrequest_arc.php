
<?php
//error_reporting(0);
session_start();
if(isset($_SESSION['ID']) && isset($_POST['proid'])){
	$proid=$_POST['proid'];
	echo $b1 =$_POST['check'];
include 'session.php';
require_once("connectionnn.php");
if($b1=='sendreq'){
$sql="insert into `messagerequests`(`req_by`,`req_to`) values('$id','$proid')";
$res=$conn->query($sql);
}
else if($b1=='accept'){
 $sql="delete from messagerequests where req_by='$proid' and req_to='$id'";
$res=$conn->query($sql);
 $sql="insert into `messages`(`user1`,`user2`,`msg`) values('$id','$proid','We can chat now!')";
$res=$conn->query($sql);
}
else if($b1=='reject'){
 $sql="delete from messagerequests where req_by='$proid' and req_to='$id'";
$res=$conn->query($sql);
}
else{
 $sql="delete from messagerequests where req_by='$id' and req_to='$proid'";
$res=$conn->query($sql);
}
}
?>