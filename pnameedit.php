<?php
require_once("connectionnn.php");
$proid=$_GET["proid"];
$pname=addslashes($_GET["pname"]);
	$pname = str_replace("<", "&lt", $pname);
	$pname = str_replace(">", "&gt", $pname);
$puser=lcfirst($_GET["puser"]).'s';
$sql = "update $puser set nickname='$pname' where id='$proid'";
$res = $conn->query($sql);
echo $pname;
?>