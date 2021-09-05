<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/addnnotes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script>
		$(document).ready(function(){
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
		});
</script>
<style type="text/css">
</style>
</head>
<body>
<div>
<center>
<h3>Add New Subject</h3>
	</center>
<form method="post" action="addNewSubject.php" id="postform">
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" width="100%" style="margin:auto; margin-top:5%;">
		<tr><td class="mdl-data-table__cell--non-numeric"><div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" rows= "3" name="s_name" id="sample5" required>
    <label class="mdl-textfield__label" for="sample5">Subject Name</label>
  </div></td></tr>
		<tr><td class="mdl-data-table__cell--non-numeric"><b>Year</b></td></tr>
		<tr><td class="mdl-data-table__cell--non-numeric" style="float:left">
	<span>All<input type="checkbox" value="y" class='check' id='y' name="a[]" checked="true"></span>&nbsp&nbsp
	<span>1st<input type="checkbox" class='y' value="1" name="p[]" checked="true"></span>&nbsp&nbsp
	<span>2nd<input type="checkbox" value="2" class='y' name="p[]" checked="true"></span>&nbsp&nbsp
	<span>3rd<input type="checkbox" value="3" class='y' name="p[]" checked="true" ></span>&nbsp&nbsp
	<span>4th<input type="checkbox" value="4" class='y' name="p[]" checked="true" ></span>&nbsp&nbsp
	</td></tr>
	<tr><td class="mdl-data-table__cell--non-numeric"><b>Branch</b></td></tr>
		<tr><td class="mdl-data-table__cell--non-numeric" style="float:left">
	<span>All<input  type="checkbox" value="b" id='b'  name="a[]" checked="true"></span>&nbsp&nbsp
	<span>CSE<input type="checkbox" value="7" class='b'  name="p[]" checked="true"></span>&nbsp&nbsp
	<span>ECE<input type="checkbox" value="8" class='b'  name="p[]" checked="true"></span>&nbsp&nbsp
	<span>EEE<input type="checkbox" value="9" class='b' name="p[]" checked="true"></span>&nbsp&nbsp
	<span>CIVIL<input type="checkbox" value="6" class='b'  name="p[]" checked="true"></span>&nbsp&nbsp
	<span>BT<input type="checkbox" value="5" class='b'  name="p[]" checked="true"></span>&nbsp&nbsp
	<span>ECM<input type="checkbox" value="10" class='b' name="p[]" checked="true"></span>&nbsp&nbsp
	<span>IT<input type="checkbox" value="11" class='b' name="p[]" checked="true"></span>&nbsp&nbsp
	<span>MECH<input type="checkbox" value="12" class='b' name="p[]" checked="true"></span>&nbsp&nbsp
	</td></tr>
		<tr><td class="mdl-data-table__cell--non-numeric">
    <input class="mdl-button mdl-js-button mdl-button--primary" type="submit" value="Submit" name="submit">
	</td></tr>
</table></form>
	</div>
</body>
</html>