<?php
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
require_once("connectionnn.php");
$pid=$_GET["pid"];
$content=addslashes($_GET["content"]);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
$sql = "update groupPosts set content='$content' where group_id='$grpid' and post_id='$pid'";
$res = $conn->query($sql);
echo $content;
}
?>