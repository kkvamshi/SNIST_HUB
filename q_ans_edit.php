<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$content=addslashes($_GET["content"]);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
$sql = "update q_answers set comment='$content' where com_id='$pid'";
$res = $conn->query($sql);
echo $content;
?>