<?php
include 'session.php';
require_once("connectionnn.php");
$grpid=$_GET["grpid"];
$gname=addslashes($_GET["gname"]);
	$gname = str_replace("<", "&lt", $gname);
	$gname = str_replace(">", "&gt", $gname);
$sql = "update groups set group_name='$gname' where group_id='$grpid'";
$res = $conn->query($sql);
echo $gname;
$msg="<b>$nn</b> changed group name<br><span class=ncomment >$gname</span>";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
?>