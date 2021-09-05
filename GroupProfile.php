<html>
<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script><script>
function prop(){
	grpid =   $('#grppiid').val();
	setTimeout(function(){
	var d=new Date();
	$('#propic').attr('style','background-image:url("groups/'+grpid+'pro.jpg?'+d.getTime()+'");');
	}, 1000);
}
function proc(url){
	grpid =   $('#grppiid').val();
	setTimeout(function(){
	var d=new Date();
	$('#head').attr('style','background-image:url("groups/'+grpid+'cover.jpg?'+d.getTime()+'");');
	}, 1000);
}
function changepro(){
	$('#pro').click();
}
function changecover(){
	$('#cover').click();
}
		$(document).ready(function(){
			
	grpid =   $('#grppiid').val();
			$('#addnn').hide();
		});
function selec(){
		if($('#select-cat').css('display')=='none')
			$('#select-cat').css('display','block');
		else
			$('#select-cat').css('display','none');
}
function shootSelec(id,paget,disname){
	$('#addnn').hide();
	$('#selectd').html(disname);
	$('#select-cat').css('display','none');
	var page=paget.toLowerCase();
	if(page=='g_members')
		$('#addnn').show();
	$('iframe').attr('src',page+'.php?grpid='+id);
}
function notf(){
	grpid =   $('#grppiid').val();
	$('#addnn').hide();
	$('#selectd').html('Notifications');
	$('#select-cat').css('display','none');
	
	$('iframe').attr('src','groupnotifications.php?grpid='+grpid);
}
</script>
 <link rel="stylesheet" type="text/css" href="css/profss.css">
  </head>
  <body><?php 
include 'session.php';
include 'include.php';
include 'connectionnn.php';
//session_destroy();
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{
	  if(isset($_GET['gindex'])&&$numOfGroups>=$_GET['gindex'])
  {
	  $gindex=$_GET['gindex'];
	  $gid=$groups[$gindex]['id'];
	  $gname=$groups[$gindex]['name'];
	  $gpro=$groups[$gindex]['pro_url'];
	  $gcover=$groups[$gindex]['cover_url'];
	  $gadmin=$groups[$gindex]['admin'];
	  $gtag=$groups[$gindex]['tag'];
	  
echo '<input type="hidden" id="grppiid" value="'.$gid.'">';
  ?>
  <div id="full">
  <div id="head"  style="background-image:url('<?php echo $gcover; ?>');">
  
  <div class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"  onclick="notf()"
  style="position:absolute; color:#ffffff; right:60; height:50; width:50;">
<i class="material-icons mdl-badge mdl-badge--overlap" >notifications</i></div>
  
<button style="position:absolute; color:white; right:10; top:10;" id="p-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>
<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="p-menu">
	<li class="mdl-menu__item" onclick="changepro()" ><span>Change profile picture</span></li>
	<li class="mdl-menu__item" onclick="changecover()" ><span>Change Cover</span></li>
	</ul>
	<iframe name='iframe_u' width=0 height=0  style="display:none;"></iframe>
	<form action="gphoto.php?grpid=<?php echo $gid; ?>" enctype="multipart/form-data" target="iframe_u" method="post">
	 <input type="file" id="pro" title="" accept="image/*" onchange="this.form.submit(); prop();" width=0 height=0 style="display:none;" value="Upload image" name="pro"></form>
	<form action="gcover.php?grpid=<?php echo $gid; ?>" enctype="multipart/form-data" target="iframe_u" method="post">
	 <input type="file" id="cover" title="" accept="image/*" onchange="this.form.submit(); proc();"  width=0 height=0 style="display:none;"  value="Upload image" name="cover"></form>
  <img id="propic" style="background-image:url('<?php echo $gpro; ?>');">
	 <div id="rig"><span id="name"><?php echo $gname; ?></span><br><br>
	 <span id="tag" ><?php echo $gtag; ?></span></div>
  </div>
  <div id="selec"><div class="mdl-js-ripple-effect" ><span onclick="selec()" class="edits" id="selecd"><span class="edits"id="selectd"><span class="mdl-ripple"></span>Posts</span>&nbsp&nbsp&nbsp&nbsp&#9759 </span>
	</div><div id="select-cat">
	<div class="mdl-js-ripple-effect" ><span onclick='shootSelec("<?php echo $gid; ?>","g_members","Members")' class="edits"><span class="mdl-ripple"></span>Members</span>
	</div><div class="mdl-js-ripple-effect" ><span onclick='shootSelec("<?php echo $gid; ?>","group","Posts")' class="edits"><span class="mdl-ripple"></span>Posts</span>
	</div><div class="mdl-js-ripple-effect" ><span onclick='shootSelec("<?php echo $gid; ?>","groupsettings","Settings")' class="edits"><span class="mdl-ripple"></span>Settings</span>
	</div></div></div>
<button id="addnn" onclick='shootSelec("<?php echo $gid; ?>","addnewGmem","Add New Member")' class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
  <i class="material-icons">add</i>
</button>
  <iframe src="<?php echo 'group.php?grpid='.$gid.'&gindex='.$gindex; ?>" ></iframe>
  </div></body>
  </html>
  
  
  
<?php }
} ?>