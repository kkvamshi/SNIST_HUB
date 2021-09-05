<?php
try{
include 'session.php';
include 'include.php';
include 'connectionnn.php';
if (!empty($_FILES['file']['name']))
{
$content=addslashes($_POST['content']);
	$content = str_replace("<", "&lt", $content);
	$content = str_replace(">", "&gt", $content);
$sub=$_POST['sub'];
$folder="notes/".$sub."/";
$file_name=$_FILES['file']['name'];

	 
    $imagename=date("d-m-Y")."-".time();
	$pid=$id."-".$imagename;

    $file_name=$_FILES['file']['name'];
    $temp_name=$_FILES['file']['tmp_name'];
    $imgtype=$_FILES['file']['type'];
    $ext= pathinfo($file_name, PATHINFO_EXTENSION);
	$fname = $file_name;
    $path = $folder.$imagename.'.'.$ext;
if(move_uploaded_file($temp_name,$path)) {
$sql = "INSERT INTO `notes`(`post_id`, `content`, `post_loc`,`posted_by`, `posted_by_nn`,`by_img`,`subject`,`fname`) VALUES ('$pid','$content','$path','$id','$nn','$url','$sub','$fname')";
if ($conn->query($sql) === TRUE) {
	$retrn= '{
	"success":true
	}';
} else {
	$retrn='{
	
	"success":false,
	"error":"'. $conn->error.'",
	"errorcode:" '. $conn->error.
	'}';
	unlink($path);
}

$conn->close();
}
else{
	$retrn='{
	
	"success":false,
	"error":"Error While uploading on the server",
	"errorcode:" '. $_FILES["file"]["error"].
	'}';
}
}
}
catch(Exception $e) {
	$retrn='{
	
	"success":false,
	 "error":'.$e->getMessage().
	'}';
}
echo $retrn;
exit();
?>