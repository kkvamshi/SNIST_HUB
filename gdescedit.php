<?php
include 'session.php'
require_once("connectionnn.php");
$grpid=$_GET["grpid"];
$gdesc=addslashes($_GET["gdesc"]);
	$gdesc = str_replace("<", "&lt", $gdesc);
	$gdesc = str_replace(">", "&gt", $gdesc);
$sql = "update groups set group_desc='$gdesc' where group_id='$grpid'";
$res = $conn->query($sql);
echo $gdesc;

	
$msg="<b>$nn</b> changed group description<br><span class=ncomment >$gdesc</span>";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
?>