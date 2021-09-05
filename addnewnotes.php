<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="fileup/fancy_fileupload.css" type="text/css" media="all" />
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
	
	<style>
		div{
			width:100%;
			display:block;
			float:left;
			background-color:#ffffff;
		}
		.mdl-textfield{
			margin:auto;
			text-align:center;
		}
	</style>
	
</head>
<body>
<?php

error_reporting(0);
if(isset($_GET["sub"])){
	$sub=$_GET["sub"];
	?>
<div id="mno">
	<div id="ano">
	<center><h5>Upload <?php echo $sub; ?> Notes</h5></center>
<?php

echo '<input type="hidden" name="sub" id="subname" value="'.$sub.'">';
?>
	</div>
	<div  id="bno">
	<div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" name="content" id="content1"></textarea>
    <label class="mdl-textfield__label" for="content1">Type description before selecting files </label>
  </div>
	</div>
		<div id="cno">
<input id="postform" type="file" name="file" multiple>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="fileup/jquery.ui.widget.js"></script>
<script type="text/javascript" src="fileup/jquery.fileupload.js"></script>
<script type="text/javascript" src="fileup/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="fileup/jquery.fancy-fileupload.js"></script>
<script type="text/javascript">
$(function() {
	function makemag(){
	$('#postform').FancyFileUpload({
	url : 'addNewN.php',
params : {
	sub : $('#subname').val() ,
	content : $("textarea#content1").val()
		},
		maxfilesize : -1
	});
	}
	makemag();
	var oldVal = "";
	$("#content1").on("change keyup paste", function() {
    var currentVal = $(this).val();
    if( currentVal == oldVal ) {
        return; //check to prevent multiple simultaneous triggers
    }else{
		makemag();
		}
  oldVal=currentVal;
});
});
</script>
	<?php
}
?>
			
	</div>
	</div>
</body>
</html>