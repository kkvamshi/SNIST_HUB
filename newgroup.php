<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="mdl/material.min.css">
<script src="mdl/material.min.js"></script>
<script>

    if(window==window.top){
	  window.location="home.php";
	}
	
</script>
</head>
<body>

<div>
<center>
<h3>New Group</h3>
	</center><center>
<form method="post" action="addGroup.php" id="postform" >
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" width="80%" style="margin:auto; margin-top:5%;">
		<tr><td class="mdl-data-table__cell--non-numeric"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" rows= "3" name="gname" id="sample5" >
    <label class="mdl-textfield__label" for="sample5">GroupName</label>
  </div></td></tr>
  	<tr><td class="mdl-data-table__cell--non-numeric"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" rows= "3" name="gtag" id="sample5" >
    <label class="mdl-textfield__label" for="sample5">Tag Line</label>
  </div></td></tr>
   <tr><td class="mdl-data-table__cell--non-numeric"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea class="mdl-textfield__input" type="text" rows= "3" name="gdesc" id="sample5" ></textarea>
    <label class="mdl-textfield__label" for="sample5">Description</label>
  </div></td></tr>
<tr><td>
    <input class="mdl-button mdl-js-button mdl-button--primary" type="submit" value="Create" name="submit">
	</td></tr>
</table></form></center>
	</div>
</body>
</html>