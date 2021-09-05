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
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>

<script src="js/q_script.js"></script>
</head>
<body>
<div id="full">

<?php

require_once("connectionnn.php");
$sql="select * from queries where post_id='$pid'";
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
	$pid=$row["post_id"];
		$file_loc=$row["file_loc"];
        $sql3 = "SELECT * from q_answers where post_id='$pid' order by time desc";
        $res3 = $conn->query($sql3);
        $c=$res3->num_rows;
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
		$post.='<div class="post_foot">	<div class="like_com"  style="height:40px;">
<button class="likebtn mdl-button mdl-js-button mdl-js-ripple-effect" onclick=liked("'.$pid.'","'.$row["posted_by"].'") style="'; 
                $sql2 = "SELECT * from q_likes where post_id='$pid' and liked_by='$id'";
                $res2 = $conn->query($sql2);
                if($res2->num_rows)
					  $post.='color:blue;';
				else
                       $post.='color:black;';	
		$post.='background-color:#ffffff; font-family:';
				$post.="'David Libre'";
				$post.=', serif; border-radius:12px; font-size:18px; margin-left:10px; float:left;">
  <i class="material-icons">thumb_up</i><span class="qlikes" style="font-size:12px;"> &nbsp'.$l.' likes</span>
</button>
		   <a href="#header"><button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="background-color:#ffffff; font-family:';
		   $post.="'David Libre'";
				$post.=', serif;  border-radius:12px; font-size:18px; margin-right:10px; float:right;">
  <i class="material-icons">question_answer</i> <span style="font-size:12px;"> &nbsp'.$c.' answers</span>
</button></a>
</div>';
		$post.='</div></div>';
				
	while($row3 = $res3->fetch_assoc())
	{
		
		$cid=$row3["com_id"];
		
		 $sqll = "SELECT * from q_a_likes where com_id='$cid'";
         $resl = $conn->query($sqll);
        $l=$resl->num_rows;
		$file_loc=$row3["file_loc"];
		$post.='<div class="post_div" style="border:2px ridge #2222dd; background-color:#ffffff; padding-left:2px; " id='.$row3["com_id"].'><div class="post_head">
		      <div class="head_img"><img height="40" width="40" src="'.$row3["by_img"].'"/></div>
		      <div class="post_info"><font class="by_name">'.$row3["com_by_nn"].'</font><br><font class="post_time">'.$row3["time"].'</font>
          	         	  </div><button style="float:right; margin-right:10px;" id="'.$row3["com_id"].'-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>
<input type="button" value="Done" onclick=savec("'.$row3["com_id"].'") style="float:right; margin:10px; padding:5px; display:none;" class="save_edit">

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="'.$row3["com_id"].'-menu">';
	    if($row['posted_by']==$id || $id=='admin' || $row3['comment_by']==$id ){
			$post.='<li class="mdl-menu__item" onclick=deletec("'.$row3["com_id"].'","'.$row3["file_loc"].'")><span  >delete</span></li>';
			$post.='<li class="mdl-menu__item" onclick=editc("'.$row3["com_id"].'") ><span>edit</span></li>';
		}
				if($row3["file_loc"]!="")
			$post.='<a href="'.$file_loc.'" download="'.$row3["fname"].'" style="text-decoration:none; " ><li class="mdl-menu__item"><span >download</span></li></a>';
			  
			//$post.='<li class="mdl-menu__item" onclick=report("'.$pid.'") ><span>share</span></li>';
			
		$post.='</ul></div>';
			  
		$post.='<div class="post_content">'.$row3["comment"].'</div>';
		if($file_loc!=""){
			
    $theData = file_get_contents( "$file_loc" );
	$theData = str_replace("<", "&lt", $theData);
	$theData = str_replace(">", "&gt", $theData);
    $post.='<pre class="prettyprint" style="max-height:300px; overflow:auto;">'.$theData.'</pre>';
			
			
		}
		$post.='<div class="post_foot" style="height:40px;">
		  
			<button class="likebtn mdl-button mdl-js-button mdl-js-ripple-effect" onclick=likedc("'.$cid.'") style="'; 
                $sql2 = "SELECT * from q_a_likes where com_id='$cid' and liked_by='$id'";
                $res2 = $conn->query($sql2);
                if($res2->num_rows)
					  $post.='color:blue;';
				else
                       $post.='color:black;';	
		$post.='background-color:#ffffff; font-family:';
				$post.="'David Libre'";
				$post.=', serif; border-radius:12px; font-size:18px; margin-left:10px; float:left;">
  <i class="material-icons">thumb_up</i><span class="qalikes" style="font-size:12px;"> &nbsp'.$l.' likes</span>
</button>';
			
			  
		$post.='</div></div>';
		
		
		
		
	}
		print $post;
		$this1 = "addnewAns.php?pid=".$pid."&pbyid=".$row['posted_by'];
		?>
		
		<div id="header">
<form method="post" action="<?php echo $this1; ?>" id="postform" enctype="multipart/form-data">

<div id="qcont">
   <textarea name="content" placeholder="Your Explanation" style="height:200px;" ></textarea>
	</div>
	  <button type="button" id="imgbtn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Upload file
</button> <button type="submit" name="submit" style="float:right; " class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
 Submit
</button>
    <input type="file" id="file" value="Upload image" onchange="preview_file(event)"  name="file">
	<div class="mdl-tooltip mdl-tooltip--large" for="imgbtn">
<strong>Click to <br>Upload File</strong>
</div><input type="text" id="ufile" style="position:relative; border:none; left:0;" readonly>
	</form></div>
	
		
		<?php
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