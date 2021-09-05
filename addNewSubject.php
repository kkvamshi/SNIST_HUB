<?php
error_reporting(0);
require_once("connectionnn.php");
$p=$_POST['p'];
$sub=$_POST["s_name"];

$privacy=1000000000000;
foreach($p as $pval){
	$privacy+=pow(10,intval($pval)-1);
}
$sql = "insert into `subjects`(`sub_name`,`privacy`) values('$sub','$privacy')";
$res = $conn->query($sql);
mkdir("notes/".$sub);
header("Location:viewsubjects.php");
?>