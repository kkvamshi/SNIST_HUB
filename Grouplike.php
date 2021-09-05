<?php 
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
include 'session.php';
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from group_likes where group_id='$grpid' and post_id='$pid' and liked_by='$id'";
$res = $conn->query($sql);
if($res->num_rows){
$sql = "DELETE from group_likes where group_id='$grpid' and post_id='$pid' and liked_by='$id'";
$res = $conn->query($sql);
echo "1";
}
else{
$sql = "insert into `group_likes`(`group_id`,`post_id`,`liked_by`) values ('$grpid','$pid','$id')";
$res = $conn->query($sql);
echo "0";
        	
$pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>$nn</b> liked your post";
    $nurl="view_group_post.php?pid=".$pid."&grpid="+grpid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }
}
}
?>