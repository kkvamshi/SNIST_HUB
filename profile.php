<?php 
include 'session.php';
include 'include.php';
include 'connectionnn.php';
//session_destroy();
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{
	  if(isset($_GET['pro_id']) && ($_GET['pro_id']!='admin'))
  {
	 $a=$_GET['pro_id'];
     $sql = "SELECT * FROM students where id='$a'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	  $pro_id=$a;
	  $pro_nn=$row['nickname'];
	  $pro_tag=$row['utag'];
	  $pro_g=$row['gender'];
	  $pro_b=$row['branch'];
	  $pro_y=$row['year'];
	  $pro_url=$row['url'];
	  $pro_can_msg=$row['can_msg'];
	  $pro_user='students';
} else {
$sql = "SELECT * FROM staff where id='$a'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	  $pro_id=$a;
	  $pro_nn=$row['nickname'];
	  $pro_tag=$row['utag'];
	  $pro_g=$row['gender'];
	  $pro_b=$row['branch'];
	  $pro_can_msg=$row['can_msg'];
	  $pro_url=$row['url'];
	  $pro_user='staff';
}
else{
     $sql = "SELECT * FROM clubs where id='$a'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	  $pro_id=$a;
	  $pro_nn=$row['nickname'];
	  $pro_tag=$row['utag'];
	  $pro_url=$row['url'];
	  $pro_can_msg=$row['can_msg'];
	  $pro_user='clubs';
}
	
}
}
  ?>
  <html>

<head> <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
 <link rel="stylesheet" type="text/css" href="css/profss.css">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script>
function selec(){
		if($('#select-cat').css('display')=='none')
			$('#select-cat').css('display','block');
		else
			$('#select-cat').css('display','none');
}
function arc(proid,aorr){
$(document).ready(function(){
    $.ajax({
				type: 'POST' ,
			url: 'msgrequest_arc.php',
			data : {
				proid : proid ,
				check:aorr
			},
			success: function(data){
				location.reload();
			}
		});
});
}
function changepro(){
	$('#pro').click();
}
function prop(url){
	setTimeout(function(){
	var d=new Date();
	$('#propic').attr('style','background-image:url("'+url+'?'+d.getTime()+'");');
	}, 1000);
}
function shootSelec(id,paget){
	$('#selectd').html(paget);
	$('#select-cat').css('display','none');
	page=paget.toLowerCase();
	$('iframe').attr('src',page+'.php?pro_id='+id);
}
function sendmsg(proid,pname){
	window.location='chat_box.php?proid='+proid+'&pname='+pname;
}

</script>
  </head>
  <body>
  <div id="full">
  <div id="head" style="background-image:url('images/proback.jpg');">
  <button style="position:absolute; color:white; right:10; top:10;" id="p-menu"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>
<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="p-menu">
	<?php 
	if($pro_id==$id)
		echo '<li class="mdl-menu__item" onclick="changepro()" ><span>Change profile picture</span></li>';
	else{
		if($pro_can_msg)
		echo '<li class="mdl-menu__item" onclick=sendmsg("'.$pro_id.'","'.$pro_nn.'") ><span>Send Message</span></li>';
			$msgsql="select * from messagerequests where req_to='$pro_id' and req_by='$id'";
			$resmsg=$conn->query($msgsql);
			if($resmsg->num_rows > 0 ){
		       echo '<li class="mdl-menu__item"><span>Request Sent</span></li>';
		       echo '<li class="mdl-menu__item" onclick=arc("'.$pro_id.'","cancel")><span>Cancel Request</span></li>';
			   
			}
			else{ 
			$msgsql="select * from messagerequests where req_by='$pro_id' and req_to='$id'";
			$resmsg=$conn->query($msgsql);
			if($resmsg->num_rows > 0 ){
		       echo '<li class="mdl-menu__item" onclick=arc("'.$pro_id.'","accept") ><span>Accept Request</span></li>';
		       echo '<li class="mdl-menu__item" onclick=arc("'.$pro_id.'","reject") ><span>Reject Request</span></li>';
			}
			else{
				
				if(!$pro_can_msg){
			$msgsql="select * from messages where ( user1='$pro_id' and user2='$id' ) or ( user2='$pro_id' and user1='$id' )";
			$resmsg=$conn->query($msgsql);
			echo $conn->error;
			if($resmsg->num_rows > 0 )
		       echo '<li class="mdl-menu__item" onclick=sendmsg("'.$pro_id.'","'.$pro_nn.'") ><span>Send Message</span></li>';
			else
		       echo '<li class="mdl-menu__item" onclick=arc("'.$pro_id.'","sendreq") ><span>Send Message Request</span></li>';
			
			}
			}
			}
	}
	?>
	</ul>
	<iframe name='iframe_u' width=0 height=0  style="display:none;"></iframe>
<form action="photo.php" enctype="multipart/form-data" target="iframe_u" method="post">
	 <input type="file" id="pro" title=" " style="display:none;" accept="image/*" onchange="this.form.submit(); prop('<?php echo $url; ?>');" value="Upload image" name="pro"></form>
  <img id="propic" style="background-image:url('<?php echo $pro_url; ?>');">
	 <div id="rig"><span id="name"><?php echo $pro_nn; ?></span><br><br>
	 <span id="tag" ><?php echo $pro_tag; ?></span></div>
  </div>
  <div id="selec"><div class="mdl-js-ripple-effect" ><span onclick="selec()" id="selecd" class="edits"><span id="selectd"><span class="mdl-ripple"></span>General</span>&nbsp&nbsp&nbsp&nbsp&#9759. </span>
	</div><div id="select-cat">
	<div class="mdl-js-ripple-effect" ><span onclick="shootSelec('<?php echo $pro_id; ?>','About')" class="edits"><span class="mdl-ripple"></span>About</span></div>
	<div class="mdl-js-ripple-effect" ><span onclick="shootSelec('<?php echo $pro_id; ?>','General')" class="edits"><span class="mdl-ripple"></span>General</span></div>
	<div class="mdl-js-ripple-effect" ><span onclick="shootSelec('<?php echo $pro_id; ?>','Queries')" class="edits"><span class="mdl-ripple"></span>Queries</span></div>
	<?php if($user=='staff'&&$pro_user=='staff'){ ?>
	<div class="mdl-js-ripple-effect" ><span onclick="shootSelec('<?php echo $pro_id; ?>','Staff')" class="edits"><span class="mdl-ripple"></span>Staff</span></div>
	<?php }
	if($pro_user=='clubs'){ ?>
	<div class="mdl-js-ripple-effect" ><span onclick="shootSelec('<?php echo $pro_id; ?>','Clubs')" class="edits"><span class="mdl-ripple"></span>Clubs</span></div>
	<?php }
	if($pro_user=='staff'){ ?>
	<div class="mdl-js-ripple-effect" ><span onclick="shootSelec('<?php echo $pro_id; ?>','Academics' )" class="edits"><span class="mdl-ripple"></span>Academics</span></div>
	<?php } ?>
	</div></div>
  <iframe src="<?php echo 'general.php?pro_id='.$pro_id; ?>" ></iframe></div>
  </body>
  </html>
  
  
  
<?php }
  } ?>