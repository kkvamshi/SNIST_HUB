<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "delete from e_comments where post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from events where post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from e_likes where post_id='$pid'";
$res = $conn->query($sql);
if(!empty($_GET["loc"])){
$l=$_GET["loc"];
unlink($l);
}
?>