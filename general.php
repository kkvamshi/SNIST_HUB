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
<?php
if(isset($_GET['pro_id'])){
	$pro_id=$_GET['pro_id'];
	$pro_url='?pro_id='.$pro_id;
}
else{
}
error_reporting(0);
include 'session.php';
include 'include.php';
include 'connectionnn.php';
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{ 
?><input type="hidden" id="branch" value="<?php echo $b; ?>"  />
<input type="hidden" id="year" value="<?php echo $year; ?>"  />
	<div id="preview1" ></div>
<?php
$thispage='addNewGen.php';
if(isset($_GET['pro_id'])){
echo '<input type=hidden id=proid value='.$_GET['pro_id'].'>';
if($pro_id==$id)
echo '<button id="addnn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:#2222dd;">
  <i class="material-icons">create</i>
</button>';
}
else{
	echo '
	<div id="head1"><span id="name">General</span>
	<span id="tag1">For Everyone and everything</span></div>';
echo '<input type=hidden id=proid value="i">';
echo '<button id="addnn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:#2222dd;">
  <i class="material-icons">create</i>
</button>';
	echo '<a href="#header">
<div id="newposts" >New Posts</div></a>';
} ?> 
<div id="posts_display_area">
<?php
	include 'getGeneral.php'; 
?>
</div>
<div id="loader-icon"><div></div></div>
<div id="bottom" ><div id="bottom_content">
<?php include 'post_form.php'; ?>
</div>
<button id="closenn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:#2222dd;">
  <i class="material-icons">undo</i>
</button></div>
<?php  }
?>
<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:40px; padding-top:15px; width:100%; position:relative; top:20px;">
<center>Developed by Balram Mitta</center>

</div>
</body>
</html>