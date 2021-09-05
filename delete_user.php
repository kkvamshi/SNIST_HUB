<?php
include 'session.php';
if(isset($_SESSION['ID']))
{
require_once("connectionnn.php");
$pro_id=$_POST["pro_id"];
$sql = "delete from all_users where id='$pro_id'";
$res = $conn->query($sql);
unlink("profiles/".$pro_id);
echo "<center><h2>HEHE!!</h2></center><br>
        User Deleted
		<br> -team SNISTHUB";
		echo $conn->error;
}

?>