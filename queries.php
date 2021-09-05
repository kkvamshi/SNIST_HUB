<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/posts.css"><link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script src="js/q_script.js">

</script>
</head>
<body>
<?php 
error_reporting(0);
include 'include.php';
include 'connectionnn.php';
include 'session.php';
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{ 
if(isset($_GET['pro_id'])){
	$pro_id=$_GET['pro_id'];
}
else{
}
?><input type="hidden" id="branch" value="<?php echo $b; ?>"  />
<input type="hidden" id="year" value="<?php echo $year; ?>"  />

<?php
$thispage='addNewQ.php';
if(isset($_GET['pro_id'])){
echo '<input type=hidden id=proid value=&pro_id='.$_GET['pro_id'].'>';
if($pro_id==$id)
   echo '<button id="addnn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:#dd2222;">
 <i class="material-icons">create</i>
</button>';
}
else{
	echo '
	<div id="head1"><span id="name">Queries</span>
	<span id="tag1">Ask Everyone in the SNIST</span></div>';
echo '<input type=hidden id=proid value="">';
	echo '<button id="addnn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:#dd2222;">
 <i class="material-icons">create</i>
</button>';
	echo '<a href="#header">
<div id="newposts" >New Queries</div></a>';
} ?> 
<div id="posts_display_area">
<?php include('getQueries.php'); ?>
</div>
<div id="bottom" ><div id="bottom_content">
<?php include 'qpost_form.php'; ?>
</div>
<button id="closenn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" style=" background-color:#dd2222;">
 <i class="material-icons">undo</i>
</button>
</div>
<div id="loader-icon"><div></div></div>
<?php  }
?>
<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:40px; padding-top:15px; width:100%; position:relative; top:20px;">
<center>Developed by Balram Mitta</center>

</div>
</body>
</html>