<?php
require_once("connectionnn.php");
$id=$_GET["id"];
$sql = "select id from students where id='$id' union select id from staff where id='$id' union select id from clubs where id='$id'";
$res = $conn->query($sql);
if($res->num_rows)
 echo "1";
else
 echo "0";
?>