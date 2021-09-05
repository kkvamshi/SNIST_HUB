<?php if(isset($_GET['grpid'])){ 
$grpid=$_GET['grpid'];
include 'session.php';
if(!isset($_SESSION['ID'])){
	header('Location:index.php?error=2');
}
require_once("connectionnn.php");
$perPage = 15;
$pid=$_POST["key"];
$sql = "SELECT id,name,nickname,url from students where (id LIKE '%$pid%' or name LIKE '%$pid%' or nickname LIKE '%$pid%') and id not in (select member_id from group_members where group_id='$grpid') union SELECT id,name,nickname,url from staff where (id LIKE '%$pid%' or name LIKE '%$pid%' or nickname LIKE '%$pid%') and id not in (select member_id from group_members where group_id='$grpid') union SELECT id,name,nickname,url from clubs where (id LIKE '%$pid%' or name LIKE '%$pid%' or nickname LIKE '%$pid%') and id not in (select member_id from group_members where group_id='$grpid')";
$res = $conn->query($sql);
$r=$res->num_rows;
$page = 1;
$x=0;
$new=0;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
$posts = $_GET["posts"];
$x=$r-$posts;
if($x>0)
$new=1;
}
$start = (($page-1)*$perPage)+$x;
if($start < 0) $start = 0;
if(!empty($_GET["pp"])) {
	$start=$start+2;
	$perPage=1;
}
$query =  $sql . " limit " . $start . "," . $perPage; 
$result = $conn->query($query);
$pages = $r/15;
if ($result->num_rows > 0) {
		echo '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />
		<input type="hidden" class="posts" value="' . $r . '" />';
    		
	while($row = $result->fetch_assoc())
	{
		$mid=$row["id"];
		$fname=$row["name"];
		$pic=$row['url'];
		$mname=$row['nickname'];
		$abcd='';
		$abcd.='<div id="'.$mid.'" class="mem">
		<div class="mem-pic" >
		<img src="'.$pic.'" />
		</div>
		<div class="mem-name">#$$$#'.$mname.'#^^^#';
			$abcd.='<span style="font-size:0.5em; color:#a1a1a1;">(#$$$#'.$fname.'#^^^#)</span>';
		
		$abcd.='</div>';
		$abcd.='<button style="float:right; margin-right:5px;" id="'.$mid.'-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button><ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="'.$mid.'-menu">';
	$checks="select * from grouprequests where group_id='$grpid' and req_to='$mid'";
    $checkresult = $conn->query($checks);
	if($checkresult->num_rows > 0 )
			$abcd.='<li class="mdl-menu__item"><span>Request Sent</span></li>';
	else
			$abcd.='<li class="mdl-menu__item" onclick=addmem("'.$mid.'") ><span>Add</span></li>';
		$abcd.='</ul>';
	    $abcd.='</div>';
		
		echo $abcd;
	}
}
}
?>