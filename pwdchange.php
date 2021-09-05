<?php
include 'session.php';
require_once("connectionnn.php");
$pwd=$_POST["new1"];
$sql = "update $user set pwd='$pwd' where id='$id'";
if($res = $conn->query($sql)){
session_destroy();
header('Location:index.php?error=6');
}
else{
session_destroy();
header('Location:index.php?error=7');
}
	
?>