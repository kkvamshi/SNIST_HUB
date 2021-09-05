<?php
error_reporting(0);

include 'session.php';
if(!isset($_SESSION['ID'])){
	header('Location:index.php?error=2');
}
include 'session.php';
require_once("connectionnn.php");
$perPage = 8;
$y=intval($year);
if(!isset($_GET['pro_id'])){
if($y!=0)
$sql = "SELECT * from notes where subject in (select sub_name from subjects where privacy%pow(10,$y)>=pow(10,$y-1) and privacy%pow(10,$b)>=pow(10,$b-1)) order by time desc";
else
$sql = "SELECT * from notes order by time desc";
}
else{
	$pro_id=$_GET['pro_id'];
if($y!=0)
$sql = "SELECT * from notes where privacy%pow(10,$y)>=pow(10,$y-1) and privacy%pow(10,$b)>=pow(10,$b-1) and posted_by='$pro_id' order by time desc";
else
$sql = "SELECT * from notes where posted_by='$pro_id' order by time desc";
}
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
	$start=$start+7;
	$perPage=1;
}
$query =  $sql . " limit " . $start . "," . $perPage; 
$result = $conn->query($query);
$pages = $r/8;
if ($result->num_rows > 0) {
		echo '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />
		<input type="hidden" class="posts" value="' . $r . '" />';
		
	while($row = $result->fetch_assoc())
	{
		$ploc=$row["post_loc"];
		$pid=$row["post_id"];
		$fname=$row["fname"];
		$post="";
		$post.='<div class="post_div" style="border-left:5px ridge white; background-color:#ffffff; padding-left:2px; margin-bottom:20px; border-radius:6px;" id='.$row["post_id"].'>';
		$post.='<div class="post_content"><b>Subject</b>:&nbsp&nbsp&nbsp'.$row["subject"].'</div>';
		$post.='<div class="post_content post_edit_content">'.$row["content"].'</div>';
		$post.='<div class="post_head">
		      <div class="head_img"><img height="40" width="40" src="'.$row["by_img"].'"/></div>
		      <div class="post_info"><font class="by_name">'.$row["posted_by_nn"].'</font><br><font class="post_time">'.$row["time"].'</font>
          	  </div><button style="float:right; margin-right:10px;" id="'.$row["post_id"].'-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>
<input type="button" value="Done" onclick=save("'.$pid.'") style="float:right; margin:10px; padding:5px; display:none;" class="save_edit">

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="'.$row["post_id"].'-menu">';
		
		$fary=explode(".",$fname);
		if(strtolower($fary[count($fary)-1]) == "pdf" )
		$post.='<a href="'.$ploc.'"  style="text-decoration:none; " ><li class="mdl-menu__item"><span>View</span></li></a>';
		else
		$post.='<a href="https://view.officeapps.live.com/op/embed.aspx?src=http://www.snisthub.com/'.$ploc.'"  style="text-decoration:none; " ><li class="mdl-menu__item"><span>View</span></li></a>';
	    if($row['posted_by']==$id || $id=='admin'){
			$post.="<li class=mdl-menu__item onclick='delete1(".'"'.$pid.'","'.$ploc.'"'.");' ><span>Delete</span></li>";
			
			
			$post.='<li class="mdl-menu__item" onclick=edit1("'.$pid.'") ><span>edit</span></li>';
		}
		if($row["post_loc"]!="")
			$post.='<a href="'.$ploc.'" download="'.$fname.'" style="text-decoration:none; " ><li class="mdl-menu__item"><span >download</span></li></a>';
			  
		$post.='</ul></div>';
		$post.='</div>';
		print $post;
	}
}
?>