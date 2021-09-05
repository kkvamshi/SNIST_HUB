<div id="header">
<form method="post" action="<?php echo $thispage.$pro_url; ?>" id="postform" enctype="multipart/form-data">
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
   <textarea name="content" placeholder="Type your text here" ></textarea>
   <div id="form_img"><img id="output_image"/></div>
	  <button type="button" id="imgbtn" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Upload <i class="material-icons">image</i>
</button>
    <input type="file" id="file" accept="image/*" value="Upload image" onchange="preview_image(event)"  name="file">
	<div class="mdl-tooltip mdl-tooltip--large" for="imgbtn">
<strong>Click to <br>Upload Image</strong>
</div>
	</form></div>
	