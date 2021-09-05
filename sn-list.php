<?php 
error_reporting(0);
if(isset($_GET["sub"])){
	$sub=$_GET["sub"];
include 'session.php';
if(!isset($_SESSION['ID'])){
	header('Location:index.php?error=2');
}
require_once("connectionnn.php");
$sql = "SELECT * from notes where subject='$sub'";
$res = $conn->query($sql);
$r=$res->num_rows;
$perPage = 15;
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
		$pid=$row["post_id"];
		$ploc=$row["post_loc"];
		$fname=$row["fname"];
		$abcd='';
		$abcd.='<div id="'.$pid.'" style="height:55px;"  class="sn"><div class="sn-name" >'.$fname;
		$abcd.='<br/><span><b>Uploaded by</b> : '.$row['posted_by_nn'].'</span></div><button style="float:right; margin-right:5px;" id="'.$pid.'-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button><ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="'.$pid.'-menu">';
		$fary=explode(".",$fname);
		if(strtolower($fary[count($fary)-1]) == "pdf" )
		$abcd.='<a href="'.$ploc.'"  style="text-decoration:none; " ><li class="mdl-menu__item"><span>View</span></li></a>';
		else
		$abcd.='<a href="https://view.officeapps.live.com/op/embed.aspx?src=http://www.snisthub.com/'.$ploc.'"  style="text-decoration:none; " ><li class="mdl-menu__item"><span>View</span></li></a>';
			
	       if($row['posted_by']==$id || $id=='admin')
			$abcd.="<li class=mdl-menu__item onclick='delete1(".'"'.$pid.'","'.$ploc.'"'.");' ><span>Delete</span></li>";
			$abcd.='<a href="'.$ploc.'" download="'.$fname.'" style="text-decoration:none; " ><li class="mdl-menu__item"><span>Download</span></li></a>';
			  
		$abcd.='</ul>';

	    $abcd.='</div>';
		
		echo $abcd;
	}
}
}
?>