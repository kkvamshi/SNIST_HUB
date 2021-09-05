<?php
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "delete from group_comments where group_id='$grpid' and post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from groupPosts where group_id='$grpid' and post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from group_likes where group_id='$grpid' and post_id='$pid'";
$res = $conn->query($sql);
if(!empty($_GET["loc"])){
$l=$_GET["loc"];
unlink($l);
}
}
?>