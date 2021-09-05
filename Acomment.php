<?php 
include 'session.php';
require_once("connectionnn.php");
$pid=$_GET["pid"];
$com=addslashes($_GET["com"]);
	$com = str_replace("<", "&lt", $com);
	$com = str_replace(">", "&gt", $com);
$sql = "insert into `a_comments`(`post_id`,`comment_by`,`by_img`,`com_by_nn`,`comment`) values ('$pid','$id','$url','$nn','$com')";
$res = $conn->query($sql);

$sql = "SELECT * from a_comments where post_id='$pid'";
$res = $conn->query($sql);
$c=$res->num_rows;
echo $c.' comments';
        	
$pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>$nn</b> commented on your post in academics<br><span class=ncomment >$com</span>";
    $nurl="view_ac_post.php?pid=".$pid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }
?>