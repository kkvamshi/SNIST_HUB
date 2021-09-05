<?php
require_once("connectionnn.php");
$proid=$_GET["proid"];
$pdesc=addslashes($_GET["pdesc"]);
	$pdesc = str_replace("<", "&lt", $pdesc);
	$pdesc = str_replace(">", "&gt", $pdesc);
$puser=lcfirst($_GET["puser"]).'s';
$sql = "update $puser set udesc='$pdesc' where id='$proid'";
$res = $conn->query($sql);
echo $pdesc;
?>