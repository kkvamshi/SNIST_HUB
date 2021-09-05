<?php
include 'session.php';
require_once("connectionnn.php");
$pwd=$_POST["pwd"];
$sql = "select * from $user where id='$id' and pwd='$pwd'";
$res = $conn->query($sql);
if($res->num_rows)
 echo "0";
else
 echo "1";
?>