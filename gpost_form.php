<div id="header">
<form method="post" action="<?php echo $thispage.$pro_url; ?>" id="postform" enctype="multipart/form-data">
 
<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
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
	