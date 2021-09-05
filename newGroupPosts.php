<?php
include 'session.php';
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
if(!isset($_SESSION['ID']))
{}
else{
require_once("connectionnn.php");
$sql = "SELECT * from groupPosts where group_id='$grpid' order by time desc";
$res = $conn->query($sql);
$r=$res->num_rows;
$n=0;
if(!empty($_GET["posts"])) {
	$posts=$_GET["posts"];
	if($posts<$r)
		echo true;
	else 
		echo false;

}
}}
	?>