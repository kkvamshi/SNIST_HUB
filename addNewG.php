<?php
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
include 'session.php';
include 'include.php';
include 'connectionnn.php';
if(isset($_POST['submit']))
{
$content=addslashes($_POST['content']);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
$folder="profiles/".$id."/";
$cat="staff";
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
$sql = "INSERT INTO `groupposts`(`group_id`,`post_id`, `content`, `post_loc`,`posted_by`, `posted_by_nn`,`by_img`) VALUES ('$grpid','$pid','$content','$path','$id','$nn','$url')";
$result = $conn->query($sql);
}
else{
exit("Error While uploading image on the server".$_FILES["file"]["error"]);
}
}
else{
	$sql = "INSERT INTO `groupposts`(`group_id`,`post_id`, `content`, `post_loc`,`posted_by`,`posted_by_nn`,`by_img`) VALUES ('$grpid','$pid','$content','','$id','$nn','$url')";
    $result = $conn->query($sql);
}
if(isset($_GET['pro_id'])){
	$pro_url='?pro_id='.$_GET['pro_id'];
	$pro_id=$_GET['pro_id'];
header("Location:group.php?grpid=".$grpid."&pro_id=".$pro_id);
}
else{
header("Location:group.php?grpid=".$grpid);
}
}
}else{echo 'fhnghnjg'; }
?>