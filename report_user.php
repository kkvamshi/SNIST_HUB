<?php
include 'session.php';
if(isset($_SESSION['ID']))
{
require_once("connectionnn.php");
$pro_id=$_POST["pro_id"];
$reason=$_POST["reason"];
$sql = "insert into `ureports`(`report_on`,`report_by`,`reason`) values('$pro_id','$id','$reason')";
$res = $conn->query($sql);
	mail("balrammitta@gmail.com","USER REPORT","Report on User with ".$pro_id." \n Reason :".$reason." \n by ".$id,"From:no-reply@snisthub.com");
echo "<center><h2>Thank You</h2></center><br>
        We will check your report soon and will take required action
		<br> -team SNISTHUB";
		echo $conn->error;
}

?>