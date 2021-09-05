<?php
error_reporting(0);
include 'session.php';
include 'include.php';
include 'connectionnn.php';
//session_destroy();
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{
	?>
<html>
<head>
<meta name="theme-color" content="#0A3250" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
 <title>SnistHub</title>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/home1.js"></script>
 <link rel="stylesheet" type="text/css" href="css/home1.css"> 
<style>

</style>

</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="head mdl-layout__header">
    <div class="mdl-layout__header-row">
	
      <span class="mdl-layout-title">SnistHub</span>
      <div class="mdl-layout-spacer"></div>
	  <div class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="micon"onclick="msgs()" >
<i class="material-icons mdl-badge mdl-badge--overlap" >message</i></div>
<div class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="nicon"  onclick="notf()" style="margin-left:10px; margin-right:10px;">
<i class="material-icons mdl-badge mdl-badge--overlap" >notifications</i></div>
	  <div class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="sicon"onclick="srch()" >
<i class="material-icons mdl-badge mdl-badge--overlap" >search</i></div>
	  <div class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="cicon"onclick="cncl()" >
<i class="material-icons mdl-badge mdl-badge--overlap" >cancel</i></div>
	  
    </div>
  </header>
  <div class="mdl-layout__drawer" id="leftt">
  <img id="propic" style="background-image:url('<?php echo $url; ?>');"/>
    <nav class="mdl-navigation">
      <a class="hlinks mdl-navigation__link" target="iframe_me" href="profile.php?pro_id=<?php echo $id; ?>" id="gen"><?php echo $nn; ?></a><hr class="hr1">
	<a class="hlinks mdl-navigation__link" target="iframe_me" href="general.php">General</a>
	<?php if($user=='staff'||$user=='admin'){ ?>
	<a class="hlinks mdl-navigation__link" target="iframe_me" href="staff.php">Staff</a>
	<?php  } ?>
	<a class="hlinks mdl-navigation__link" target="iframe_me" href="queries.php">Queries</a>
	<a class="hlinks mdl-navigation__link" href="clubs.php" target="iframe_me" class="hlinks">Clubs</a>
	<a class="hlinks mdl-navigation__link" target="iframe_me" href="academics.php">Academics</a><br><hr class="hr1">
	<?php 
	$i=0;
	for($i=0;$i<$numOfGroups;$i++){
		echo '<a class="hlinks mdl-navigation__link" target="iframe_me" href="GroupProfile.php?gindex='.$i.'">'.$groups[$i]['name'].'</a>';
	}
	echo '<a class="hlinks mdl-navigation__link" target="iframe_me" href="newgroup.php">Create New Group</a><br>';
	?>
	<hr class="hr1">
	<a class="hlinks mdl-navigation__link" target="iframe_me" href="notes.php">Notes</a>
	<hr class="hr1">
	<a class="hlinks mdl-navigation__link" target="iframe_me" href="usersettings.php">Account Settings</a>
	<a class="hlinks mdl-navigation__link" href="logout.php">Logout</a><br>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
		<div id="mid">
	<?php if($user!='clubs'){ ?>
	<iframe src="general.php" id="iframe" name="iframe_me"></iframe>
	<?php }else{ ?>
	<iframe src="clubs.php" id="iframe" name="iframe_me"></iframe>
	<?php  } ?>
	<div id="search1">
	<div id="search-head">
<input type="text" id="searchinput" placeholder="Search with ID,Name" name="sinput"><input type="image" id="search-button" src="images/search.png"></div>
<div id="suggestions"></div>
	</div>
	</div>
	<div id="rightt">
<?php include 'homeright.php'; ?>
	</div>
	<iframe src="about:blank" id="iiframe" name="iframe_u"></iframe>
	
	</div>
  </main>
</div>
<?php
}
?>
</body>
</html>