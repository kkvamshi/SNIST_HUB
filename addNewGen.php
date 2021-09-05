<?php

error_reporting(0);
include 'session.php';
include 'connectionnn.php';
if(isset($_POST['submit']))
{
$content=addslashes($_POST['content']);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
$p=$_POST['p'];
$privacy=10000000000000;
foreach($p as $pval){
	$privacy+=pow(10,intval($pval)-1);
}
$folder="profiles/".$id."/";
$cat="general";
$file_name=$_FILES['file']['name'];
function GetImageExtension($imagetype)
     {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
    $imagename=date("d-m-Y")."-".time();
	$pid=$id."-".$imagename;
if (!empty($file_name))
{
    $file_name=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $imgtype=$_FILES['file']['type'];
    $ext= GetImageExtension($imgtype);
    $path = $folder.$imagename.$ext;
if(move_uploaded_file($temp_name,$path)) {
$sql = "INSERT INTO `general`(`post_id`, `content`, `post_loc`,`posted_by`,`privacy`, `posted_by_nn`,`by_img`) VALUES ('$pid','$content','$path','$id',$privacy,'$nn','$url')";
$result = $conn->query($sql);
$rnd=rand(10000000,99999999);
$_SESSION['randid']=$rnd;
include "mailss.php";
sendMail("all",$privacy,"General","success",$rnd);
}
else{
exit("Error While uploading image on the server".$_FILES["file"]["error"]);
}
}
else{
	$sql = "INSERT INTO `general`(`post_id`, `content`, `post_loc`,`posted_by`,`privacy`, `posted_by_nn`,`by_img`) VALUES ('$pid','$content','','$id',$privacy,'$nn','$url')";
    $result = $conn->query($sql);
$rnd=rand(10000000,99999999);
$_SESSION['randid']=$rnd;
include "mailss.php";
sendMail("all",$privacy,"General","success",$rnd);
}
unset($_POST);
if(isset($_GET['pro_id'])){
	$pro_url='?pro_id='.$_GET['pro_id'];
	$pro_id=$_GET['pro_id'];
header("Location:general.php?pro_id=".$pro_id);
}
else{
header("Location: general.php");
}
}

?>