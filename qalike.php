<?php 
include 'session.php';
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from q_a_likes where com_id='$pid' and liked_by='$id'";
$res = $conn->query($sql);
if($res->num_rows){
$sql = "DELETE from q_a_likes where com_id='$pid' and liked_by='$id'";
$res = $conn->query($sql);
echo "1";
}
else{
$sql = "insert into `q_a_likes`(`com_id`,`liked_by`) values ('$pid','$id')";
$res = $conn->query($sql);
echo "0";
}

?>