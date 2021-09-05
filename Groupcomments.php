<?php 
include 'session.php';
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from group_comments where group_id='$grpid' and post_id='$pid' order by time desc";
$res = $conn->query($sql);
$coms="";
while($row1 = $res->fetch_assoc())
		$coms.='<div class="com_head_img"><img height="30" width="30" src="'.$row1["by_img"].'"/></div>
		      <div class="com_info"><font class="com_name"><b>'.$row1["com_by_nn"].'</b></font><br><font class="com">'.$row1["comment"].'</font>
          	  </div>';
	print $coms;
}
?>