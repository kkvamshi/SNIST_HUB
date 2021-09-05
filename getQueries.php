<?php
if(!isset($_SESSION['ID']))
include 'session.php';
require_once("connectionnn.php");
$perPage = 4;
$y=intval($year);
if(!isset($_GET['pro_id'])){
if($y!=0)
$sql = "SELECT * from queries where privacy%pow(10,$y)>=pow(10,$y-1) and privacy%pow(10,$b)>=pow(10,$b-1) order by time desc";
else
$sql = "SELECT * from queries order by time desc";
}
else{
	$pro_id=$_GET['pro_id'];
if($y!=0)
$sql = "SELECT * from queries where privacy%pow(10,$y)>=pow(10,$y-1) and privacy%pow(10,$b)>=pow(10,$b-1) and posted_by='$pro_id' order by time desc";
else
$sql = "SELECT * from queries where posted_by='$pro_id' order by time desc";
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
$start = ($page-1)*$perPage+$x;
if($start < 0) $start = 0;
if(!empty($_GET["pp"])) {
	$start=$start+2;
	$perPage=1;
}
$query =  $sql . " limit " . $start . "," . $perPage; 
$result = $conn->query($query);
$pages = $r/4;
if ($result->num_rows > 0) {
		echo '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />
		<input type="hidden" class="posts" value="' . $r . '" />';
	while($row = $result->fetch_assoc())
	{
		$pid=$row["post_id"];
		$file_loc=$row["file_loc"];
		
		 $sqll = "SELECT * from q_likes where post_id='$pid'";
         $resl = $conn->query($sqll);
        $l=$resl->num_rows;
		$post="";
		$post.='<div class="post_div" style="border-left:5px ridge #dd2222; background-color:#ffffff; padding-left:2px; margin-bottom:20px; border-radius:6px;" id='.$row["post_id"].'><div class="post_head">
		      <div class="head_img"><img height="40" width="40" src="'.$row["by_img"].'"/></div>
		      <div class="post_info"><font class="by_name">'.$row["posted_by_nn"].'</font><br><font class="post_time">'.$row["time"].'</font>
          	         	  </div><button style="float:right; margin-right:10px;" id="'.$row["post_id"].'-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>
<input type="button" value="Done" onclick=save("'.$pid.'") style="float:right; margin:10px; padding:5px; display:none;" class="save_edit">

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="'.$row["post_id"].'-menu">';
	    if($row['posted_by']==$id || $id=='admin'){
			$post.='<li class="mdl-menu__item" onclick=delete1("'.$pid.'")><span  >delete</span></li>';
			$post.='<li class="mdl-menu__item" onclick=edit1("'.$pid.'") ><span>edit</span></li>';
		}
		else{
			$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","queries") ><span>report</span></li>';
		}
		if($id=='admin')
			$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","queries") ><span>report</span></li>';
			$post.='<li class="mdl-menu__item" onclick=view("'.$pid.'","queries") ><span>view</span></li>';
				if($row["file_loc"]!="")
			$post.='<a href="'.$file_loc.'" download="'.$row["fname"].'" style="text-decoration:none; " ><li class="mdl-menu__item"><span onclick=download("'.$pid.'") >download</span></li></a>';
			  
			//$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'") ><span>share</span></li>';
			
		$post.='</ul></div>';
			  
		$post.='<div class="post_content">'.$row["content"].'</div>';
		if($file_loc!=""){
			
    $theData = file_get_contents( "$file_loc" );
	$theData = str_replace("<", "&lt", $theData);
	$theData = str_replace(">", "&gt", $theData);
    $post.='<pre class="prettyprint" style="max-height:500px; overflow:auto;">'.$theData.'</pre>';
			
			
		}
		$post.='<div class="post_foot">
		<div class="like_com"  style="height:40px;">
<button class="likebtn mdl-button mdl-js-button mdl-js-ripple-effect" onclick=liked("'.$pid.'","'.$row["posted_by"].'") style="'; 
                $sql2 = "SELECT * from q_likes where post_id='$pid' and liked_by='$id'";
                $res2 = $conn->query($sql2);
                if($res2->num_rows)
					  $post.='color:blue;';
				else
                       $post.='color:black;';	
		$post.='background-color:#ffffff; font-family:';
				$post.="'David Libre'";
				$post.=', serif; border-radius:12px; font-size:18px; margin-right:10px; float:left;">
  <i class="material-icons">thumb_up</i><span class="qlikes" style="font-size:12px;"> &nbsp'.$l.' likes</span>
</button>
		   <button class="mdl-button mdl-js-button mdl-js-ripple-effect" onclick=view("'.$pid.'","queries") style="background-color:#662222; font-family:';
				$post.="'David Libre'";
				$post.=', serif; border-radius:12px; font-size:18px; margin-right:10px; color:white; float:right;">
  View
</button>
</div>';
		$post.='</div></div>';
		print $post;
	}
}
?>