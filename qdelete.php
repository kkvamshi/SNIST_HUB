<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "select * from q_answers where post_id='$pid'";
$res = $conn->query($sql);
	while($row = $res->fetch_assoc())
	{
		$file = $row["file_loc"];
		unlink($file);
	}
$sql = "select * from queries where post_id='$pid'";
$res = $conn->query($sql);
	while($row = $res->fetch_assoc())
	{
		$file = $row["file_loc"];
		unlink($file);
	}
	
$sql = "delete from q_answers where post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from queries where post_id='$pid'";
$res = $conn->query($sql);
?>