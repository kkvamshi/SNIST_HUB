<?php
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from q_a_likes where com_id='$pid'";
$res = $conn->query($sql);
$l=$res->num_rows;
echo $l." likes";
?>