 <html>
 <head>
 <title>SnistHub - Login</title>
	 <meta name="theme-color" content="#000000" />
<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta name="description" content="A college Social networking site developed exclusively for Sreenidhi Institute of Science and Technology. ">
	 <meta name="keywords" content="snist,SNIST,login,snisthub,telangana,india,college,social,networking,site,sreenidhi,institute,of science,and,technology,students,student,portal,posts,notes,snist faculty,srinidhi,yamnampet,ghatkesar,hyderabad,b.tech,engineering,computer science,snist,cse,snist,snist,mitta balram,balrammitta,balram mitta,btech,technology,balram,mitta,snistbook,snist facebook,snistnotes,snistcommunity,snistfaculty,sniststudents,snist students,autonomous,engineering college">
	 <meta name="copyright" content="Balram Mitta,SnistHub">
	 <meta name="reply-to" content="balrammitta@gmail.com">
	 <meta name="author" content="Balram Mitta">
 <link rel="stylesheet" type="text/css" href="css/ind.css">
	 <link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
 </head>
 <body>
 <?php 
   include 'session.php';
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
<img src="images/snist.png" /> 
		<div id="sups"><a href="club_signup.php" >
			<input type="button" value="Club Register" id="sign"/></a>
			<a href="staff_signup.php" ><input type="button" value="Staff Register" id="sign"/></a>
			<a href="signup.php" >	<input type="button" value="Student Register" id="sign"/></a>
	</div></div>
	<div id="mn">
	<div id="mnl">
	</div>
    <div id="mnr"><?php if(isset($_GET['error']))
		{  echo "Message:";
			if($_GET['error']==3)
				echo "Account with given ID doesn't exist";
			if($_GET['error']==4)
				echo "Incorrect Password";
			if($_GET['error']==2)
				echo "Login first";
			if($_GET['error']==1)
				echo "You have logged out successfully";
			if($_GET['error']==5)
				echo "Account registered succesfull";
			if($_GET['error']==6)
				echo "Password Changed Successfulllly<br>Please Login Again";
			if($_GET['error']==7)
				echo "Error while updating password<br>Please Login and try again";
		 
		}
		?>
	    <form method='post' action='loginAccess.php'><table>
		<tr><th colspan=3 >Login</th></tr>
		
		<tr><td>Id</td><td>:</td><td><input type="text" name="lid" minlength="10" maxlength="10" placeholder="Enter your Id" required ></td>
		</tr>
		<tr><td>Password</td><td>:</td><td><input type="password" minlength="6" maxlength="20" name="lpw" placeholder="Enter your password" required></td>
		</tr>
		<tr><td>Login as</td><td>:</td><td><select name="las">
			   <option value="students">Student</option>
			   <option value="staff">Staff</option>
			   <option value="clubs">Club</option>
			   </select>
		</td></tr>
		
		<tr><td></td><td></td><td><input type="submit" name="lst" ></td>
		</tr>
		</table>
		</form>
		
		</div><marquee>For any queries and FeedBack Email:balrammitta@gmail.com or whatsapp: 7893260228</marquee>
	</div>
	<?php 
	}
	?>
 </body>
 </html>