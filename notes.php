<html>
<?php 

//error_reporting(0);
include 'session.php';
include 'include.php';
include 'connectionnn.php';
?>
<head>
 <link rel="stylesheet" type="text/css" href="css/posts.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script>

    if(window==window.top){
	 window.location="home.php";
	}
	var pro_id =   $('#proid').val();
	function liked(pid){
		$(document).ready(function(){
		    $.ajax({
			url: 'Alike.php?pid='+pid,
			success: function(data){
				if(data == 1)
				   $('#'+pid+' .like').attr("src","images/like.png");
			   else
				   $('#'+pid+' .like').attr("src","images/liked.png");
			     $.ajax({
			              url: 'Alikes.php?pid='+pid,
			              success: function(dat){
				          $('#'+pid+' .likes').html(dat);
			              },
			              error: function(){} 	        
	                });
			},
			error: function(){} 	        
	   });
		});
	}
		function save(pid){
			var content=$('#'+pid+' .e_content').val();
			$('#'+pid+' .save_edit').css('display','none');
		$(document).ready(function(){
		    $.ajax({
			url: 'Aedit.php?pid='+pid+'&content='+content,
			success: function(data){
				$('#'+pid+' .post_edit_content').html(data);
			},
			error: function(){} 	        
	   });
		});
	}
	function edit1(pid){
			$('#'+pid+' .save_edit').css('display','block');
			var content=$('#'+pid+' .post_edit_content').html();
		$('#'+pid+' .post_edit_content').html('<textarea width="100%" height="150px" class="e_content" style="border:none; width:100%; ">'+content+'</textarea>');
			$('#'+pid+' .e_content').focus().val("").val(content);
	}
	function delete1(pid,location){	
		$(document).ready(function(){
			if(confirm("If you delete,Your post won't be recovered again")){
	var pro_id =   $('#proid').val();
		    $.ajax({
			url: 'notesdelete.php?pid='+pid+'&loc='+location,
			success: function(data){
				$('#'+pid).html('deleted');
				if(Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
				    var posts = parseInt($(".posts:first").val());
					posts-=1;
					$(".posts:first").val(posts);
				var pagenum = parseInt($(".pagenum:last").val());
				var posts = parseInt($(".posts:first").val());
				if(pro_id.length>3)
				getresult('getnotes.php?page='+pagenum+'&posts='+posts+'&pp=1&pro_id='+pro_id);
			    else
				getresult('getnotes.php?page='+pagenum+'&posts='+posts+'&pp=1');
				$('#'+pid).html('Your post is deleted');
			}
			},
			error: function(){} 	        
	   });
	   function getresult(url) {
		$.ajax({
			url: url,
			beforeSend: function(){
			$('#loader-icon').show();
			$(window).scroll(function(){});
			},
			complete: function(){
			$('#loader-icon').hide();
			f=1;
			},
			success: function(data){
			$("#posts_display_area").append(data);
			componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
			}
		});
	}
	function selyear(){
		if($('#select-year').css('display')=='none')
			$('#select-year').css('display','block');
		else
			$('#select-year').css('display','none');
	}
	function selbranch(){
		if($('#select-branch').css('display')=='none')
			$('#select-branch').css('display','block');
		else
			$('#select-branch').css('display','none');
	}
	function addnew(){
		$(document).ready(function(){
			window.location="viewsubjects.php";
		});
	}

	
			$('#newposts').hide();
$(document).ready(function(){
			$('#loader-icon').hide();
			$('#newposts').hide();
	
$('input[type=checkbox]').change(function(){
	var branch =   $('#branch').val();
	var year   =   $('#year').val();
	if($(this).val()=='y'){
		if($(this).is(':checked'))
			$('.y').prop('checked',true);
		else
			$('.y').prop('checked',false);
	}
	if($(this).val()=='b'){
		if($(this).is(':checked'))
			$('.b').prop('checked',true);
		else
			$('.b').prop('checked',false);
	}
	
			var j=0;
			var i=0;
	
	try{
	$('input[type=checkbox][value='+branch+']').prop('checked',true);		
	$('input[type=checkbox][value='+year+']').prop('checked',true);	
	}	
	catch(err){}
	if(parseInt($(this).val())<=4){
		if(!$(this).is(':checked'))
			$('#y').prop('checked',false);
		else{
			j=0;
			for(i=1;i<5;i++){
			if($('input[type=checkbox][value='+i+']').is(':checked'))
				j+=1;
			}
			if(j==4)
			  $('#y').prop('checked',true);
		}
    }		
	if(parseInt($(this).val())>4){
		if(!$(this).is(':checked'))
			$('#b').prop('checked',false);
		else{
			j=0;
			for(i=5;i<11;i++){
			if($('input[type=checkbox][value='+i+']').is(':checked'))
				j+=1;
			}
			if(j==6)
			  $('#b').prop('checked',true);
		}
	}
});
	var f=1;
function getresult(url) {
		$.ajax({
			url: url,
			beforeSend: function(){
			$('#loader-icon').show();
			$(window).scroll(function(){});
			},
			complete: function(){
			$('#loader-icon').hide();
			f=1;
			},
			success: function(data){
			$("#posts_display_area").append(data);
			componentHandler.upgradeDom();
			},
			error: function(){} 	        
	   });
	}
	$(window).scroll(function(){
		if(f==1){
		  if ($(window).scrollTop() > 650*($(document).height()/670-1)){
			    f=0;
			  console.log("yes scroll");
			  console.log($(".pagenum:last").val());
			  console.log($(".total-page").val());
				if( Number($(".pagenum:last").val()) < Number($(".total-page").val())) {
					
			  console.log("yes if scroll");
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var posts = parseInt($(".posts:first").val());
				var proid =   $('#proid').val();
				if(proid.length>3)
				getresult('getnotes.php?page='+pagenum+'&posts='+posts+'&pro_id='+proid);
			    else
				getresult('getnotes.php?page='+pagenum+'&posts='+posts);
				
			}
		  }
		}
	});
	$("#newposts").click(function(){
		location.reload("true");
	});
});
</script>
</head>
<body>
<?php 
//error_reporting(0);
if(isset($_GET['pro_id'])){
	$pro_id=$_GET['pro_id'];
}
else{
}
if(!isset($_SESSION['ID']))
	header('Location:index.php?error=2');
else
{ 

echo '<button id="addnn" onclick="addnew()" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored">
  All subjects
</button>';

if($user=='staff'||$user=='admin'){ 
if(isset($_GET['pro_id'])){
echo '<input type=hidden id=proid value="'.$_GET['pro_id'].'" >';
}
	else
	echo '<input type=hidden id=proid value="">'; 
}
else
if(!isset($_GET['pro_id'])){
	echo '<a href="#header"><div id="newposts" >New Posts</div></a>';
} 	
	echo '<input type=hidden id=proid value="">'; 
	?>

<input type="hidden" id="branch" value="<?php echo $b; ?>"  />
<input type="hidden" id="year" value="<?php echo $year; ?>"  />
	<div id="subs" style="width:100%; display:block; top:0; left:0; right:0; position:relative; overflow-x:scroll; white-space: nowrap; background-color:#f1f1f1; ">
<?php 
 $y=intval($year);
if($y!=0){
$sql = "select sub_name from subjects where privacy%pow(10,$y)>=pow(10,$y-1) and privacy%pow(10,$b)>=pow(10,$b-1)";
$res = $conn->query($sql);

	while($row = $res->fetch_assoc())
	{
		$sub=$row["sub_name"];
       echo '<a href="viewnotes.php?sub='.$sub.'" style="text-decoration:none;">
	   <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" style="margin:3px;  position:relative; display:inline;">
  '.$sub.'
</button></a>';
}
}
?>
</div>

<div id="posts_display_area" style="position:relative; top:10;" >
<?php include('getnotes.php'); ?>
</div>
<div id="loader-icon"><div></div></div>
	<div id="foot" style="background-color:#222244; color:white; font-size:18px; height:40px; padding-top:15px; width:100%; position:relative; top:20px;">
<center>Developed by Balram Mitta</center>

</div>
<?php  }
?>
</body>
</html>