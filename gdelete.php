<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "delete from gen_comments where post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from general where post_id='$pid'";
$res = $conn->query($sql);
$sql = "delete from gen_likes where post_id='$pid'";
$res = $conn->query($sql);
if(!empty($_GET["loc"])){
$l=$_GET["loc"];
unlink($l);
}
?>