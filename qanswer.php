<?php 
include 'session.php';
require_once("connectionnn.php");
$pid=$_GET["pid"];
$com=addslashes($_GET["com"]);
$sql = "insert into `q_answers`(`post_id`,`comment_by`,`by_img`,`com_by_nn`,`comment`) values ('$pid','$id','$url','$nn','$com')";
$res = $conn->query($sql);

$sql = "SELECT * from q_answers where post_id='$pid'";
$res = $conn->query($sql);
$c=$res->num_rows;
echo $c.' answers';

$pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>".ucfirst($nn)."</b> replied to your query<br><span class=ncomment >$com</span>";
    $nurl="view_q_post.php?pid=".$pid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }

?>