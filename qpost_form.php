<div id="header">
<form method="post" action="<?php echo $thispage.$pro_url; ?>" id="postform" enctype="multipart/form-data">
 
	<div id="year">
	<button type="button"  onclick="selyear()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Year
</button>
	
	<div id="select-year">
	<span>All<input type="checkbox" value="y" class='check' id='y' name="a[]" checked="true"></span>
	<span>1st&nbsp <input type="checkbox" class='y' value="1" name="p[]" checked="true"></span>
	<span>2nd <input type="checkbox" value="2" class='y' name="p[]" checked="true"></span>
	<span>3rd&nbsp <input type="checkbox" value="3" class='y' name="p[]" checked="true" ></span>
	<span>4th&nbsp <input type="checkbox" value="4" class='y' name="p[]" checked="true" ></span>
	</div>
	</div>
	<div id="branch"><button type="button" onclick="selbranch()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Branch
</button>
	<div id="select-branch">
	<span>All<input  type="checkbox" value="b" id='b'  name="a[]" checked="true"></span>
	<span>CSE<input type="checkbox" value="7" class='b'  name="p[]" checked="true"></span>
	<span>ECE<input type="checkbox" value="8" class='b'  name="p[]" checked="true"></span>
	<span>EEE<input type="checkbox" value="9" class='b' name="p[]" checked="true"></span>
	<span>CIVIL<input type="checkbox" value="6" class='b'  name="p[]" checked="true"></span>
	<span>IT<input type="checkbox" value="11" class='b' name="p[]" checked="true"></span>
	<span>MECH<input type="checkbox" value="12" class='b' name="p[]" checked="true"></span>
	<span>BT<input type="checkbox" value="5" class='b'  name="p[]" checked="true"></span>
	<span>ECM<input type="checkbox" value="10" class='b' name="p[]" checked="true"></span>
	</div>
	</div><button type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Post
</button>
<div id="qcont">
   <textarea name="content" placeholder="Type your text here" ></textarea>
	</div>
	  <button type="button" id="imgbtn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Upload File
</button>
    <input type="file" id="file" accept="" value="Upload image" onchange="preview_file(event)"  name="file">
	<div class="mdl-tooltip mdl-tooltip--large" for="imgbtn">
<strong>Click to <br>Upload File</strong>
</div>
<input type="text" id="ufile" style="position:relative; border:none; left:0;" readonly>
	</form></div>
	