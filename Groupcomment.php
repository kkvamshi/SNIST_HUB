<?php 
include 'session.php';
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
require_once("connectionnn.php");
$pid=$_GET["pid"];
$com=addslashes($_GET["com"]);
	$com = str_replace("<", "&lt", $com);
	$com = str_replace(">", "&gt", $com);
$sql = "insert into `group_comments`(`group_id`,`post_id`,`comment_by`,`by_img`,`com_by_nn`,`comment`) values ('$grpid','$pid','$id','$url','$nn','$com')";
$res = $conn->query($sql);

$sql = "SELECT * from group_comments where group_id='$grpid' and post_id='$pid'";
$res = $conn->query($sql);
$c=$res->num_rows;
echo $c.' comments';
    $pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>$nn</b> commented on your post in groups<br><span class=ncomment >$com</span>";
    $nurl="view_group_post.php?pid=".$pid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }
    
}
?>