 <html>
 <head>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/ind.css">
<link href='https://fonts.googleapis.com/css?family=Butcherman' rel='stylesheet'>
 
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
 <script language="javascript" type="text/javascript">
 window.onload = function() {
    //document.getElementById("my_audio").play();
}</script><script>
</script>
 </head>
 <body>
 <audio id="my_audio" src="audio/arb.mp3" loop="loop"></audio>
 <?php 
   include 'session.php';
   include 'include.php';
 if(isset($_SESSION["ID"]))
   header('Location:home.php');
 else
 {
 ?>
	<img src="images/logo4.png" id="loggg1" height=150px width=150/>
	<img src="images/logo2.png" id="loggg2" height=150px width=150/>
	<img src="images/logo3.png" id="loggg3" height=150px width=150/>
	<img src="images/logo5.png" id="loggg4" height=150px width=150/>
	<img src="images/logo6.png" id="loggg5" height=150px width=150/>
	<img src="images/logo7.png" id="loggg6" height=150px width=150/>
	<img src="images/logo8.png" id="loggg7" height=150px width=150/>
	<img src="images/logo9.png" id="loggg8" height=150px width=150/>
    <div id="top">
	<img src="images/snist.png" height=100% width=40%/>
	</div>
	<div id="mn">
	<div id="mnl">
	</div>
    <div id="mnr"><?php if(isset($_GET['error']))
		{  echo "Message:";
			if($_GET['error']==3)
				echo "Account with given ID doesn't exist";
			if($_GET['error']==4)
				echo "Incorrect Password";
		 
		}
		?>
	    <form method='post' action='adminloginAccess.php'><table>
		<tr><th colspan=3 >Login</td></tr>
		
		<tr><td>Id</td><td>:</td><td><input type="text" name="lid" placeholder="Enter your Id" required ></td>
		</tr>
		<tr><td>Password</td><td>:</td><td><input type="password" minlength="6" maxlength="20" name="lpw" placeholder="Enter your password" required></td>
		</tr>
		
		<tr><td></td><td></td><td><input type="submit" name="lst" ></td>
		</tr>
		</table>
		</form>
		
	</div>
	</div>
	<?php 
	}
	?>
 </body>
 </html>