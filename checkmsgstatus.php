<?php

error_reporting(0);
include 'session.php';
if(isset($_POST['proid']) && isset($_SESSION['ID'])){
	$pro_id=$_POST['proid'];
include 'connectionnn.php';
$sql="select * from messages where user1='$id' and user2='$pro_id' order by time desc limit 0,1 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
		echo $row['status'];
}
}
?>