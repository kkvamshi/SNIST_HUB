<?php 
     include 'session.php';
 if(isset($_SESSION['ID']))
  {
if(isset($_POST['gname']))
  {
require_once("connectionnn.php");
$gname=addslashes($_POST["gname"]);
	$gname = str_replace("<", "&lt", $gname);
	$gname = str_replace(">", "&gt", $gname);
$gtag=addslashes($_POST["gtag"]);
	$gtag = str_replace("<", "&lt", $gtag);
	$gtag = str_replace(">", "&gt", $gtag);
$gdesc=addslashes($_POST["gdesc"]);
	$gdesc = str_replace("<", "&lt", $gdesc);
	$gdesc = str_replace(">", "&gt", $gdesc);
$gid=$gname.rand(1000,9999).time();
$gpro='groups/'.$gid.'pro.jpg';
$gcover='groups/'.$gid.'cover.jpg';
copy('images/grouppro.jpg',$gpro);
copy('images/groupcover.jpg',$gcover);
$sql = "insert into `groups`(`group_id`,`group_name`,`group_tag`,`group_desc`,`group_created_by`,`pro_url`,`cover_url`) values('$gid','$gname','$gtag','$gdesc','$id','$gpro','$gcover')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error1: " . $sql . "<br>" . $conn->error;
}
$sql = "insert into `group_members`(`group_id`,`member_id`,`admin`) values('$gid','$id',1)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error2: " . $sql . "<br>" . $conn->error;
}
include 'include.php';
echo $gindex=$grpindex["$gid"];
header("Location:GroupProfile.php?gindex=$gindex");

  }
  }
  ?>