<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$ploc=$_GET["ploc"];
	
$sql = "delete from q_answers where com_id='$pid'";
$res = $conn->query($sql);
unlink($ploc);
?>