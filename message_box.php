<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ID']) && isset($_GET['proid'])){
include 'session.php';
require_once("connectionnn.php");
$perPage = 10;
$pro_id=$_GET['proid'];
$pname=$_GET['pname'];
$sql="select * from messages where ( user1='$id' and user2='$pro_id' ) or ( user2='$id' and user1='$pro_id' ) order by time asc";
$res = $conn->query($sql);
if(($r=$res->num_rows) > 0 ){
$page = 1;
$x=0;
$new=0;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
$msgs = $_GET["msgs"];
 $x=$r-$msgs;
}
$start =$r - ((($page)*$perPage)+$x);
if($start < 0){ 
$perPage=$perPage+$start;
$start = 0;
$page=$page+1;
}
if(!empty($_GET["pp"])) {
	$start=$start+19;
	$perPage=1;
}
$query =  $sql . " limit " . $start . "," . $perPage; 
$result = $conn->query($query);
$conn->error;
$pages = $r/10;
if ($result->num_rows > 0) {
		echo '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />
		<input type="hidden" class="msgs" value="' . $r . '" /><input type="hidden" class="nmsgs" value="' . $r . '" />';
		
	while($row = $result->fetch_assoc())
	{
		$user1=$row['user1'];
		$user2=$row['user2'];
		$msg=$row['msg'];
		$status=$row['status'];
		$time=$row['time'];
		$msgid='';
		$out="";
		if($user1==$id){
			$class1='sentmsg';
			$sname='you';
			if($status=='sent'){
				$colr='#f1f1f1';
				$msgid='sent';
			}
			else if($status=='delivered'){
				$colr='#ffffff';
				$msgid='del';
			}
			else{
				$colr='rgba(180,240,180,1)';
				$msgid='seen';
			}
		}
		else{
				$colr='rgba(180,180,240,1)';
			$class1='recmsg';
			$sname=$pname;
		}
		$out.='<div class="msgbox"><div class="'.$class1.' '.$msgid.'" style="background-color:'.$colr.';">
		<div class="mhname"><b>'.$sname.'</b></div>
		<div class="msgtext">'.$msg.'</div>
		<div class="time"></div>
		<div class="msgtime" style="display:none;">'.$time.'</div>
		</div>
		</div>';
		print $out;
		
	}
	
$sql="update messages set status='seen' where user1='$pro_id' and user2='$id' and status!='seen'";
$conn->query($sql);
}
}
else{
	echo '<input type="hidden" class="nmsgs" value="0" />';
}
}
?>