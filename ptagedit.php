<?php
require_once("connectionnn.php");
$proid=$_GET["proid"];
$ptag=addslashes($_GET["ptag"]);
	$ptag = str_replace("<", "&lt", $ptag);
	$ptag = str_replace(">", "&gt", $ptag);
$puser=lcfirst($_GET["puser"]).'s';
$sql = "update $puser set utag='$ptag' where id='$proid'";
$res = $conn->query($sql);
echo $ptag;
?>