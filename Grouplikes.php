<?php
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from group_likes where group_id='$grpid' and post_id='$pid'";
$res = $conn->query($sql);
$l=$res->num_rows;
echo $l." likes";
}
?>