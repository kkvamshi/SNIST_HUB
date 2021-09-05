<?php
include 'session.php';
if(isset($_SESSION['ID'])&&isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	
?>

<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/posts.css"><link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>

<script src="js/gen_script.js"></script>
</head>
<body>
<div id="full">

<?php

require_once("connectionnn.php");
$sql="select * from general where post_id='$pid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

		
	while($row = $result->fetch_assoc())
	{
		$i=0;
		$j=0;
		$years;
		$branchs;
		$branches[5]='bt';
		$branches[6]='civil';
		$branches[7]='cse';
		$branches[8]='eee';
		$branches[9]='ece';
		$branches[10]='ecm';
		$branches[11]='it';
		$branches[12]='mech';
		
		$privacy=$row["privacy"];
		for($j=0;$j<5;$j++){
		if(bcmod($privacy,pow(10,$j))>=pow(10,$j-1))
		{	$years[$i]=$j;
	        $i++;
		}
		}
		$i=0;
		for($j=5;$j<13;$j++){
		if(bcmod($privacy,pow(10,$j))>=pow(10,$j-1))
		{	$branchs[$i]=$branches[$j];
	        $i++;
		}
		}
		echo "<div class=post_div style='font-size:32px;' ><p>Privacy:";
		foreach($years as $yr){
			echo "$yr -";
		}
		echo "year(s)<br>";
		foreach($branchs as $yr){
			echo "($yr)";
		}
		echo "</p></div>";
		$y=intval($year);
		if((bcmod($privacy,pow(10,$y))>=pow(10,$y-1)&&bcmod($privacy,pow(10,$b))>=pow(10,$b-1))||$y==0){
		$ploc=$row["post_loc"];
		$pid=$row["post_id"];
        $sql1 = "SELECT * from gen_likes where post_id='$pid'";
        $res1 = $conn->query($sql1);
        $l=$res1->num_rows;
        $sql3 = "SELECT * from gen_comments where post_id='$pid' order by time desc";
        $res3 = $conn->query($sql3);
        $c=$res3->num_rows;
		$post="";
		$post.='<div class="post_div" style="border-left:5px ridge #2222dd; background-color:#ffffff; padding-left:2px; margin-bottom:20px; border-radius:6px;" id='.$row["post_id"].'><div class="post_head">
		      <div class="head_img"><img height="40" width="40" src="'.$row["by_img"].'"/></div>
		      <div class="post_info"><font class="by_name">'.$row["posted_by_nn"].'</font><br><font class="post_time">'.$row["time"].'</font>
          	  </div><button style="float:right; margin-right:5px;" id="'.$row["post_id"].'-menu"
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
			$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","general") ><span>report</span></li>';
		}
		if($id=='admin')
			$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","general") ><span>report</span></li>';
			$post.='<li class="mdl-menu__item" onclick=view("'.$pid.'","general") ><span>view</span></li>';
			//$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'","'.$ploc.'") ><span>share</span></li>';
			if($row["post_loc"]!="")
			$post.='<a href="'.$ploc.'" download="'.$row["posted_by_nn"].'.jpg" style="text-decoration:none; " ><li class="mdl-menu__item"><span onclick=download("'.$pid.'") >download</span></li></a>';
			  
		$post.='</ul></div>';
		$post.='<div class="post_content">'.$row["content"].'</div>';
	         if($row["post_loc"]!=""){		  
		          $post.='<div class="post_img_div"><img class=postimg src="'.$row["post_loc"].'"/></div>';
			 }
		
$post.='<div class="post_foot">';

	

$post.='<div class="like_com">
<button onclick=liked("'.$pid.'","'.$row["posted_by"].'") style="float:left;" class="like mdl-button mdl-js-button mdl-button--icon">
<i class="material-icons" style="'; 
                $sql2 = "SELECT * from gen_likes where post_id='$pid' and liked_by='$id'";
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
</div><div class="lcs" style="height:12px;"><span class="likes">'.$l.' likes</span><span class="comments">'.$c.' comments</span></div>';
			 			  $post.='<div class="post_comment" style="max-height:500px;">';
			 if($c>0){
				  
	while($row1 = $res3->fetch_assoc())
		$post.='<div class="com_div" ><div class="com_head_img"><img height="30" width="30" src="'.$row1["by_img"].'"/></div>
		      <div class="com_info"><font class="com_name"><b>'.$row1["com_by_nn"].'</b></font><br><font class="com">'.$row1["comment"].'</font>
          	  </div></div>';
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