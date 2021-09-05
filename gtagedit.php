<?php
include 'session.php';
require_once("connectionnn.php");
$grpid=$_GET["grpid"];
$gtag=addslashes($_GET["gtag"]);
	$gtag = str_replace("<", "&lt", $gtag);
	$gtag = str_replace(">", "&gt", $gtag);
$sql = "update groups set group_tag='$gtag' where group_id='$grpid'";
$res = $conn->query($sql);
echo $gtag;

$msg="<b>$nn</b> changed group tag<br><span class=ncomment >$gtag</span>";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
?>