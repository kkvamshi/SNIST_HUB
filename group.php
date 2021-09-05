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
<?php 
error_reporting(0);
include 'session.php';
include 'include.php';
include 'connectionnn.php';
if(isset($_GET['grpid'])){ 
	  $gid=$_GET['grpid'];
echo '<input type="hidden" id="grppiid" value="'.$gid.'">';

	$pro_url='';
if(isset($_GET['pro_id'])){
	$pro_id=$_GET['pro_id'];
	$pro_url='&pro_id='.$pro_id;
}
else{
}
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{ 
?>
	<div id="preview1" ></div>

<?php
$thispage='addNewG.php?grpid='.$gid;
if(isset($_GET['pro_id'])){
echo '<input type=hidden id=proid value='.$_GET['pro_id'].'>';
if($pro_id==$id)
 echo '<button id="addnn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:pink;">
 <i class="material-icons">create</i>
</button>';
}
else{
echo '<input type=hidden id=proid value="">';
echo '<button id="addnn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:pink;">
 <i class="material-icons">create</i>
</button>';
	echo '<a href="#header">
<div id="newposts" >New Posts</div></a>';
} ?> 
<div id="posts_display_area">
<?php include('getGroup.php'); ?>
</div>
<div id="loader-icon"><div></div></div>
<div id="bottom" ><div id="bottom_content">
<?php include 'gpost_form.php'; ?>
</div>
<button id="closenn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:pink;">
 <i class="material-icons">undo</i>
</button>
</div>
<?php  }
}
?>
</body>
</html>