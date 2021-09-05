<?php
include 'session.php';
if(!isset($_SESSION['ID']))
{}
else{
require_once("connectionnn.php");
if($b!=0)
$sql = "SELECT * from staffPosts where privacy%pow(10,$b)>=pow(10,$b-1) order by time desc";
else
$sql = "SELECT * from staffPosts order by time desc";
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
}
	?>