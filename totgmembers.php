<?php
if(isset($_GET['grpid'])){ 
require_once("connectionnn.php");
$grpid=$_GET['grpid'];
$sql = "SELECT * from group_members where group_id='$grpid'";
$res = $conn->query($sql);
$r=$res->num_rows;
echo $r." Members";
}
?>