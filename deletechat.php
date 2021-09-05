<?php

error_reporting(0);
include 'session.php';
if(isset($_POST['proid']) && isset($_SESSION['ID'])){
	$pro_id=$_POST['proid'];
include 'connectionnn.php';
$sql="delete from `messages` where ( user1='$id' and user2='$pro_id' ) or ( user2='$id' and user1='$pro_id' )";
$result=$conn->query($sql);
}
?>