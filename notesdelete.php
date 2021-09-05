<?php
error_reporting(0);
if(isset($_GET['pid'])){
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "delete from notes where post_id='$pid'";
$res = $conn->query($sql);
if(!empty($_GET["loc"])){
$l=$_GET["loc"];
unlink($l);
}
}
?>