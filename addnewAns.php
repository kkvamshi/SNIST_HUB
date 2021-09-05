<?php 
error_reporting(0);
include 'include.php';
include 'connectionnn.php';
include 'session.php';
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{ 
if(isset($_POST['submit']))
{
	$pid=$_GET["pid"];
$folder="profiles/".$id."/";
$content=addslashes($_POST['content']);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
    $file_name=$_FILES['file']['name'];
    $imagename=date("d-m-Y")."-".time();
	$com_id=$pid."-".$imagename;
if (!empty($file_name))
{
    $file_name=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $imgtype=$_FILES['file']['type'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $path = $folder.$imagename.'.'.$ext;
if(move_uploaded_file($temp_name,$path)) {
$sql = "INSERT INTO `q_answers`(`post_id`,`com_id`, `comment`, `file_loc`,`fname`,`comment_by`,`com_by_nn`,`by_img`) VALUES ('$pid','$com_id','$content','$path','$file_name','$id','$nn','$url')";
$result = $conn->query($sql);

$pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>".ucfirst($nn)."</b> replied to your query<br><span class=ncomment >$content</span>";
    $nurl="view_q_post.php?pid=".$pid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }

}
else{
exit("Error While uploading image on the server".$_FILES["file"]["error"]);
}
}
else{
$sql = "INSERT INTO `q_answers`(`post_id`,`com_id`, `comment`,`comment_by`,`com_by_nn`,`by_img`) VALUES ('$pid','$com_id','$content','$id','$nn','$url')";
    $result = $conn->query($sql);
	
$pbyid=$_GET["pbyid"];
    if($pbyid!=$id){
$msg="<b>".ucfirst($nn)."</b> replied to your query<br><span class=ncomment >$content</span>";
    $nurl="view_q_post.php?pid=".$pid;
$query = "insert into `notifications`(`to_id`,`msg`,`nurl`) values('$pbyid','$msg','$nurl')"; 
    $result = $conn->query($query);
    }

}
echo $conn->error;
header("Location:view_q_post.php?pid=".$pid);
}
}
?>
