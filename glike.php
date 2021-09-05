<?php 
include 'session.php';
require_once("connectionnn.php");
$pid=$_GET["pid"];
$sql = "SELECT * from gen_likes where post_id='$pid' and liked_by='$id'";
$res = $conn->query($sql);
if($res->num_rows){
$sql = "DELETE from gen_likes where post_id='$pid' and liked_by='$id'";
$res = $conn->query($sql);
echo "1";
}
else{
$sql = "insert into `gen_likes`(`post_id`,`liked_by`) values ('$pid','$id')";
$res = $conn->query($sql);
echo "0";
    	
$pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>$nn</b> liked your post";
    $nurl="view_gen_post.php?pid=".$pid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }
}

?>