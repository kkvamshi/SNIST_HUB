<?php

error_reporting(0);
include 'session.php';
if(isset($_SESSION['ID'])){
include 'connectionnn.php';
 $sql="select * from notifications where to_id='".$id."'";
$result = $conn->query($sql);
echo $result->num_rows;
}
?>