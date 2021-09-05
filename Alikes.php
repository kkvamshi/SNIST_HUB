<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from a_likes where post_id='$pid'";
$res = $conn->query($sql);
$l=$res->num_rows;
echo $l." likes";
?>