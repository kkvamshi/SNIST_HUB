<?php

	include 'session.php';	 
if(isset($_SESSION['ID'])&&isset($_POST['cs'])){
$cs=$_POST['cs'];
include 'connectionnn.php';
$sql="update $user set can_see=$cs where id='$id'";
     $result = $conn->query($sql);
}else
	header('Location:index.php?error=2');
?>