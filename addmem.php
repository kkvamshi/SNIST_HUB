<?php
include 'session.php';
require_once("connectionnn.php");

if(isset($_GET['grpid'])&&isset($_GET['mid'])){ 
$grpid=$_GET['grpid'];
$mid=$_GET['mid'];
$query12 = "select * from groups where group_id='$grpid'"; 
    $result12 = $conn->query($query12);
$row12 = $result12->fetch_assoc();
$gname=$row12['group_name'];
	
$query = "select can_add from `students` where id='$mid' union select can_add from `clubs` where id='$mid' union select can_add from `staff` where id='$mid'"; 
$result = $conn->query($query);

echo $conn->error;
$row = $result->fetch_assoc();
echo $conn->error;
if($row['can_add']){
$query = "insert into `group_members`(`group_id`,`member_id`) values('$grpid','$mid')"; 
$result = $conn->query($query);
echo $conn->error;
    
		 $prosql="select nickname,url from `students` where id='$mid'
		 union
		 select nickname,url from `clubs` where id='$mid'
		 union
		 select nickname,url from `staff` where id='$mid'";
		 $respro=$conn->query($prosql);
		 $rowpro = $respro->fetch_assoc();
		 $conn->error;
		 $nname=$rowpro['nickname'];
$msg="<b>$nn</b> added <b>$nname</b>";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
$msg="<b>$nn</b> added you to the group <b>$gname</b>";
$query = "insert into `notifications`(`to_id`,`msg`) values('$mid','$msg')"; 
    $result = $conn->query($query);
    echo $conn->error;
}
else{
	$query = "insert into `grouprequests`(`group_id`,`req_by`,`req_to`) values('$grpid','$id','$mid')"; 
    $result = $conn->query($query);
    echo $conn->error;
}

}
?>