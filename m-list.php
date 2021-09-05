<?php if(isset($_GET['grpid'])){ 
$grpid=$_GET['grpid'];
include 'session.php';
if(!isset($_SESSION['ID'])){
	header('Location:index.php?error=2');
}
require_once("connectionnn.php");
$sql = "SELECT * from group_members where group_id='$grpid' and member_id='$id' and admin=1";
$res = $conn->query($sql);
$r=$res->num_rows;
$gadmin=$r;
$perPage = 15;
$sql = "SELECT * from group_members where group_id='$grpid'";
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
	$start=$start+14;
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
		$mid=$row["member_id"];
		$adm=$row["admin"];
		$sql1 = "SELECT url,nickname from students where id='$mid' union SELECT url,nickname from staff where id='$mid' union SELECT url,nickname from clubs where id='$mid'";
        $res11 = $conn->query($sql1);
		$row11 = $res11->fetch_assoc();
		$pic=$row11['url'];
		$mname=$row11['nickname'];
		$abcd='';
		$abcd.='<div id="'.$mid.'" class="mem">
		<div class="mem-pic" >
		<img src="'.$pic.'" />
		</div>
		<div class="mem-name">'.$mname;
		if($adm)
			$abcd.='<span style="font-size:0.5em; color:blue;">(admin)</span>';
		
		$abcd.='</div>';
		if($gadmin){
		if($mid!=$id){
		$abcd.='<button style="float:right; margin-right:5px;" id="'.$mid.'-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button><ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="'.$mid.'-menu">';
	    if($adm)
			$abcd.='<li class="mdl-menu__item" onclick=remadm("'.$mid.'")><span  >Cancel Admin</span></li>';
		else
			$abcd.='<li class="mdl-menu__item" onclick=addadm("'.$mid.'")><span  >Make Admin</span></li>';
			
			$abcd.='<li class="mdl-menu__item" onclick=remmem("'.$mid.'") ><span>Remove</span></li>';
		$abcd.='</ul>';
		}
	}
	    $abcd.='</div>';
		
		echo $abcd;
		}
}
}
?>