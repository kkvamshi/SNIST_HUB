<?php
include 'session.php';
if(isset($_SESSION['ID'])&&isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$grpid=$_GET['grpid'];
	
?>

<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/posts.css"><link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script src="js/group_script.js"></script>
</head>
<body>
<div id="full">

<?php

require_once("connectionnn.php");
$sql="select * from groupposts where post_id='$pid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

		echo '<input type="hidden" id="grppiid" value="'.$grpid.'">';
	while($row = $result->fetch_assoc())
	{
		include 'include.php';
	if($groups[$grpindex["$grpid"]]=$grpid){
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
			$post.='<li class="mdl-menu__item" onclick=view("'.$pid.'","groupposts") ><span>view</span></li>';
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
			 
				  $post.='<div class="post_comment" style="max-height:1000px;">';
			 if($c>0){
				  
	while($row1 = $res3->fetch_assoc())
		$post.='<div class="com_head_img"><img height="30" width="30" src="'.$row1["by_img"].'"/></div>
		      <div class="com_info"><font class="com_name"><b>'.$row1["com_by_nn"].'</b></font><br><font class="com">'.$row1["comment"].'</font>
          	  </div>';
			  $post.='</div>';
			  }
			  $post.='</div>';
		$post.='</div></div>';
		print $post;
		}
		else{
			echo '<div class="post_div" style="border-left:5px ridge #2222dd; background-color:#ffffff; padding-left:2px; margin-bottom:20px; border-radius:6px;">
			Sorry, You can\'t see this Post</div>';
		}
	}
}


?>
</div>
</body>
</html>
<?php
}
?>