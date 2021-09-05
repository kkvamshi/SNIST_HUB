 <html>
 <head>
 <title>SnistHub - Club Regiter</title>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
	 
	 	 <meta name="description" content="Click Here to regiter for a club account in snisthub. Only for the clubs of Sreenidhi Institute of Science and Technology. ">
	 <meta name="keywords" content="snist SNIST sign up signup login snisthub telangana india college social networking site sreenidhi institute of science and technology students student portal posts notes snist faculty srinidhi yamnampet ghatkesar hyderabad b.tech engineering computer science snist snist snist mitta balram goud balrammitta btech technology balram mitta snistbook snist facebook snistnotes snistcommunity snistfaculty sniststudents snist students autonomous engineering college">
	 <meta name="copyright" content="SnistHub">
	 <meta name="reply-to" content="balrammitta@gmail.com">
	 <meta name="author" content="Balram Mitta">
 <link rel="stylesheet" type="text/css" href="css/ind.css">
	 <link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">
 
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
 <script language="javascript" type="text/javascript">
 window.onload = function() {
    //document.getElementById("my_audio").play();
}
function checkForm(form){
	var f=0;
		    $.ajax({
			url: 'checkId.php?id='+form.lid.value,
			async: false ,
			success: function(data){
			  f=data;
			},
			error: function(){} 	        
	   });
   if(f == 1){
		$('input[type=text][name=lid]').focus().val("");
		$('span').html('Account with given ID already exists');
        return false;	
	}
	else
		return true;		   
}

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
	<img src="images/snist.png" height=100% width=40%/><a href="index.php" ><input type="button" id="login" onclick="login()" value="Login" ></a>
	</div>
	<div id="mn">
	<div id="mnl">
	</div>
    <div id="mnr">
	<?php
	error_reporting(0);
  include 'include.php';
  include 'connectionnn.php';
  if(isset($_POST['lid']) || isset($_POST['tid']) || isset($_POST['pass'])){
  if(isset($_POST['lid']))
  {
$id=$_POST['lid'];
$fname=$_POST['lf'];
$email=$_POST['le'];
$mobile=$_POST['lm'];
$sql = "INSERT INTO `temp_club` (`id`, `name`, `nn`,`mobile`, `email`) 
VALUES ('$id', '$fname', '$fname','$mobile', '$email');";
$result = $conn->query($sql);
  echo '<form action="club_signup.php" method="post">
   <input type=hidden value="'.$id.'" name="tid" >
   <input type="text" placeholder="enter club registrations password" name="ttpass"><br>
   <input type="submit" name="submit">
   </form>';
  
  } 
  if(isset($_POST['tid']))
  {
	$a=$_POST['tid'];
	 
	 $b=$_POST['ttpass'];
$sql = "SELECT * FROM admin where id='admin'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
   $p=$row['club'];
 if($p==$b)
  { 
   echo '<form action="club_signup.php" method="post">
   <input type=hidden value="'.$a.'" name="id" ><br><br><br>
   <input type="password" placeholder="Create Your Password" name="pass">&nbsp&nbsp&nbsp&nbsp
   <input type="submit" name="submit">
   </form>';
  }
  else{
	  echo 'Password Incorrect';
	  echo '<form action="club_signup.php" method="post">
   <input type=hidden value="'.$a.'" name="tid" >
   <input type="text" placeholder="enter club registrations password" name="ttpass"><br>
   <input type="submit" name="submit">
   </form>';
  }
  }
  if(isset($_POST['pass']))
  {
       $a=$_POST["id"];
       $sql = "SELECT * FROM temp_club where id='$a'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
        $id=$row["id"];
		 $pass=$_POST["pass"];
		 $name=$row["name"];
		 $m=$row["mobile"];
		 $e=$row["email"];
		 $url="profiles/$id/pro.jpg";
		 $sql="insert into all_users(`id`,`type`) values ('$id','clubs')";
		 $result = $conn->query($sql);
           $sql = "INSERT INTO `clubs` (`id`,`pwd`, `name`, `nickname`,`mobile`, `email`,`url`) 
       VALUES ('$id','$pass', '$name', '$name','$m', '$e','$url')";
        if($result = $conn->query($sql)){
			session_destroy();
                mkdir("profiles/$a");
				copy('images/pro.jpg',"profiles/$id/pro.jpg");
       $sql = "delete FROM temp_club where id='$a'";
       $result = $conn->query($sql);
	   
			mail("balrammitta@gmail.com","SnistHub New User","Id:".$id."\nName:".$name."\nEmail:".$e."\nMobile:".$m."\n"); 
			mail($e,"SNISTHUB ACCOUNT SUCCESSFULL","Thank you ".$nn.", for creating Account.Please Log in to SnistHub to join the community\n\nYour Details\n\nId:".$id."\nName:".$name."\n"); 
	header('Location:index.php?error=5');
		}
         else
			 echo $conn->error;
  }
  }
  else
  {
	  include 'club_sign.php';
  }
  
?>
		
	</div>
	</div>
	<?php 
	}
	?>
 </body>
 </html>