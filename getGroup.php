<?php
if(isset($_GET['grpid'])){
	$grpid=$_GET['grpid'];
if(!isset($_SESSION['ID']))
include 'session.php';
require_once("connectionnn.php");
$perPage = 3;
$sql = "SELECT * from groupposts where group_id='$grpid' order by time desc";
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
$pages = $r/3;
if ($result->num_rows > 0) {
		echo '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />
		<input type="hidden" class="posts" value="' . $r . '" />';
		
	while($row = $result->fetch_assoc())
	{
		$ploc=$row["post_loc"];
		$pid=$row["post_id"];
        $sql1 = "SELECT * from group_likes where group_id='$grpid' and post_id='$pid'";
        $res1 = $conn->query($sql1);
        $l=$res1->num_rows;
        $sql3 = "SELECT * from group_comments where group_id='$grpid' and post_id='$pid' order by time desc";
        $res3 = $conn->query($sql3);
        $c=$res3->num_rows;
		$post="";
		$post.='<div class="post_div"style="border-left:5px ridge pink; background-color:#ffffff; padding-left:2px; margin-bottom:20px; border-radius:6px;" id='.$row["post_id"].'><div class="post_head">
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
			$post.='<li class="mdl-menu__item" onclick=delete1("'.$pid.'","'.$ploc.'")><span  >delete</span></li>';
			$post.='<li class="mdl-menu__item" onclick=edit1("'.$pid.'") ><span>edit</span></li>';
		}
		else{
			$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","groupposts") ><span>report</span></li>';
		}
		if($id=='admin')
			$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","groupposts") ><span>report</span></li>';
			$post.='<li class="mdl-menu__item" onclick=view("'.$pid.'","'.$grpid.'") ><span>view</span></li>';
			//$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","") ><span>share</span></li>';
			if($row["post_loc"]!="")
			$post.='<a href="'.$ploc.'" download="'.$row["posted_by_nn"].'.jpg" style="text-decoration:none; " ><li class="mdl-menu__item"><span onclick=download("'.$pid.'") >download</span></li></a>';
			  
		$post.='</ul></div>';
		$post.='<div class="post_content">'.$row["content"].'</div>';
	         if($row["post_loc"]!=""){		  
		          $post.='<div class="post_img_div"><img class=postimg src="'.$row["post_loc"].'"/></div>';
			 }
		$post.='<div class="post_foot"><div class="like_com" style="height:40px;">
	<button onclick=liked("'.$pid.'","'.$row["posted_by"].'") style="float:left;" class="like mdl-button mdl-js-button mdl-button--icon">
<i class="material-icons" style="'; 
                $sql2 = "SELECT * from group_likes where post_id='$pid' and liked_by='$id'";
                $res2 = $conn->query($sql2);
                if($res2->num_rows)
					  $post.='color:blue;"';
				else
                       $post.='color:black;"';	
		$post.='>thumb_up</i></button>
		     <input type="text" class="com" placeholder="Type your comment here" />
			  <button class="comment mdl-button mdl-js-button mdl-button--icon" style="float:right;"  onclick=commented("'.$pid.'","'.$row["posted_by"].'")  height="100%">
  <i class="material-icons">comment</i>
</button>
			  </div>
			  <div class="lcs"><span class="likes">'.$l.' likes</span><span class="comments">'.$c.' comments</span></div>';
			 
				  $post.='<div class="post_comment">';
			 if($c>0){
					  
	while($row1 = $res3->fetch_assoc())
		$post.='<div class="com_div" ><div class="com_head_img"><img height="30" width="30" src="'.$row1["by_img"].'"/></div>
		      <div class="com_info"><font class="com_name"><b>'.$row1["com_by_nn"].'</b></font><br><font class="com">'.$row1["comment"].'</font>
          	  </div></div>';
			  }
			  $post.='</div>';
		$post.='</div></div>';
		print $post;
	}
}
}
?>