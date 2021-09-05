<?php
include 'session.php';
if(isset($_SESSION['ID']))
{
require_once("connectionnn.php");
$pid=$_POST["pid"];
$tab=$_POST["tab"];
$sql = "insert into `preports`(`post_id`,`by_id`,`post_table`,`usertype`) values('$pid','$id','$tab','$user')";
	mail("balrammitta@gmail.com","POST REPORT","Report on ".$tab." post with pid:".$pid." by ".$id,"From:no-reply@snisthub.com");
$res = $conn->query($sql);
}

?>