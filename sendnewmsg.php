<?php

error_reporting(0);
include 'session.php';
if(isset($_POST['proid']) && isset($_POST['msg']) && isset($_SESSION['ID'])){
	$pro_id=$_POST['proid'];
	$msg=addslashes($_POST['msg']);
include 'connectionnn.php';
$sql="insert into `messages`(`msg`,`user1`,`user2`) values('$msg','$id','$pro_id')";
$result=$conn->query($sql);
}
?>