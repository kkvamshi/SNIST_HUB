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
$folder="profiles/".$id."/";
$content=addslashes($_POST['content']);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
    $file_name=$_FILES['file']['name'];

$p=$_POST['p'];
$privacy=1000000000000;
foreach($p as $pval){
	$privacy+=pow(10,intval($pval)-1);
}
    $imagename=date("d-m-Y")."-".time();
	$pid=$id."-".$imagename;
if (!empty($file_name))
{
    $file_name=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $imgtype=$_FILES['file']['type'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $path = $folder.$imagename.$ext;
if(move_uploaded_file($temp_name,$path)) {
$sql = "INSERT INTO `queries`(`post_id`, `content`, `file_loc`,`fname`,`posted_by`,`privacy`, `posted_by_nn`,`by_img`) VALUES ('$pid','$content','$path','$file_name','$id',$privacy,'$nn','$url')";
$result = $conn->query($sql);
$rnd=rand(10000000,99999999);
$_SESSION['randid']=$rnd;
include "mailss.php";
sendMail("all",$privacy,"Queries","success",$rnd);
}
else{
exit("Error While uploading image on the server".$_FILES["file"]["error"]);
}
}
else{
$pid=$id.date("d-m-Y").rand(1000,9999).time();
	$sql = "INSERT INTO `queries`(`post_id`, `content`,`posted_by`,`privacy`, `posted_by_nn`,`by_img`) VALUES ('$pid','$content','$id',$privacy,'$nn','$url')";
    $result = $conn->query($sql);
$rnd=rand(10000000,99999999);
$_SESSION['randid']=$rnd;
include "mailss.php";
sendMail("all",$privacy,"Queries","success",$rnd);
}
if(isset($_GET['pro_id'])){
	$pro_id=$_GET['pro_id'];
header("Location:queries.php.php?pro_id=".$pro_id);
}
else{
header("Location:queries.php");
}

}
}
?>
