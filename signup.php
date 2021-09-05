 <html>
 <head>
 <title>SnistHub - Student Register</title>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
	 
	 	 <meta name="description" content="Click Here to register for a student account in snisthub. Only for the students of Sreenidhi Institute of Science and Technology.">
	 <meta name="keywords" content="snist,SNIST,signup,snisthub,telangana,india,college,social,networking,site,sreenidhi,institute,of science,and,technology,students,student,portal,posts,notes,snist faculty,srinidhi,yamnampet,ghatkesar,hyderabad,b.tech,engineering,computer science,snist,cse,snist,snist,mitta balram,balrammitta,balram mitta,btech,technology,balram,mitta,snistbook,snist facebook,snistnotes,snistcommunity,snistfaculty,sniststudents,snist students,autonomous,engineering college">
	 <meta name="copyright" content="SnistHub">
	 <meta name="reply-to" content="balrammitta@gmail.com">
	 <meta name="author" content="Balram Mitta">
	 
 <link rel="stylesheet" type="text/css" href="css/ind.css">
<link href='https://fonts.googleapis.com/css?family=David Libre' rel='stylesheet'>
 
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
	<img src="images/snist.png" height=100% width=40%/><a href="index.php" ><input type="button" id="login" onclick="login()" value="Login" ></a>
	</div>
	<div id="mn">
	<div id="mnl">
	</div>
    <div id="mnr">
	<?php
	error_reporting(0); 
  include 'connectionnn.php';
  if(isset($_POST['lid']) || isset($_POST['tid']) || isset($_POST['pass'])){
  if(isset($_POST['lid']))
  {
$id=$_POST['lid'];
$fname=$_POST['lf'];
$nn=$_POST['ln'];
$branch=$_POST['b'];
$year=$_POST['y'];
$dob=$_POST['ld'];
$email=$_POST['le'];
$mobile=$_POST['lm'];
$gender=$_POST['g'];
$o=rand(1000,9999);
$to=$mobile;
$msg="Your_OTP_for_SNISTHUB_register_is_$o";
$_SESSION["otp"]=$o;
$otp=rand(100,9999999).date("d").rand(10,999).time().rand(1000,999999).date("m").rand(10000,9999999).date("Y").rand(100,999);
$link='snisthub.com/signup.php?id='.$id.'&otp='.$otp;
$sql="delete from temp_std where id='$id'";
$result = $conn->query($sql);
$sql = "INSERT INTO `temp_std` (`id`, `name`, `nn`, `branch`, `year`, `dob`, `mobile`, `email`, `gender`, `link`,`otp`) 
VALUES ('$id', '$fname', '$nn', '$branch', '$year', '$dob', '$mobile', '$email', '$gender', '$link','$otp');";
$result = $conn->query($sql);

if(false){
echo "An OTP has been sent to <br>your registered Mobile number";
  echo '<form action="signup.php" method="post">
   <input type=hidden value="'.$id.'" name="tid" >
   <input type="text" placeholder="OTP" name="otp"><br>
   <input type="submit" name="submit">
   </form>';
  
  echo '<input type="button" onclick="location.reload()" value="Resend otp">';
}
else{


$message = '
<html>
<head>
  <title>SNISTHUB</title>
</head>
<body>
<h4>Hi , '.$fname.'</h4>
<p>Please Click Below to Access your Account</p>
  <a href="'.$link.'"><button class="button" style=" background-color: blue; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">Click Here</button></a>
<br>
<br>
<h4>OR</h4>
<p>Direct Link:'.$link.'</p>
<br>
<p>Ignore if You are not initiated</p>
</body>
</html>
';
$subject="SNISTHUB ACCOUNT VERIFICATION";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

$headers[] = 'Cc: balrammitta@gmail.com';
$headers[] = 'Bcc: balrammitta@snisthub.com';
$headers[] = 'From: admin@snisthub.com';
mail($email, $subject, $message, implode("\r\n", $headers));
	echo 'Please click on the link sent to your registered email Address<br>('.$email.')<br>It may take few minutes.Please wait!';
}
 
  } 
  if(isset($_POST['tid']))
  {
	$a=$_POST['tid'];
	 
	 $b=$_POST['otp'];
$sql = "SELECT * FROM temp_std where id='$a'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if($_SESSION["otp"]==$b)
  { 
   echo '<form action="signup.php" method="post">
   <input type=hidden value="'.$a.'" name="id" ><br><br><br>
   <input type="password" placeholder="Set Your Password" name="pass">&nbsp&nbsp&nbsp&nbsp
   <input type="submit" name="submit">
   </form>';
  }
  }
	  session_start();
	  if(isset($_POST['pass'])){
   if(isset($_SESSION['tempid']) && isset($_SESSION['tempotp']))
  {
       $a=$_SESSION['tempid'];
       $b=$_SESSION['tempotp'];
	  unset($_SESSION['tempotp']);
	  unset($_SESSION['tempotp']);
       $sql = "SELECT * FROM temp_std where id='$a' and otp='$b'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
        $id=$row["id"];
		 $pass=$_POST["pass"];
		 $name=$row["name"];
		 $nn=$row["nn"];
		 $branch=$row["branch"];
		 $year=$row["year"];
		 $dob=$row["dob"];
		 $m=$row["mobile"];
		 $e=$row["email"];
		 $g=$row["gender"];
		 $url="profiles/$id/pro.jpg";
		 $sql="insert into all_users(`id`,`type`) values ('$id','students')";
		 $result = $conn->query($sql);
           $sql = "INSERT INTO `students` (`id`,`pwd`, `name`, `nickname`, `branch`, `year`, `dob`, `mobile`, `email`, `gender`, `url`) 
       VALUES ('$id','$pass', '$name', '$nn', '$branch', '$year', '$dob', '$m', '$e', '$g', '$url')";
        if($result = $conn->query($sql)){
			session_destroy();
                mkdir("profiles/$a");
				copy('images/pro.jpg',"profiles/$id/pro.jpg");
       $sql = "delete FROM temp_std where id='$a'";
       $result = $conn->query($sql);
			mail("balrammitta@gmail.com","SnistHub New User","Id:".$id."\nName:".$name."\nBranch:".$branch."\nYear:".$year."\nEmail:".$e."\nMobile:".$m."\nGender:".$g."\n"); 
			mail($e,"SNISTHUB ACCOUNT SUCCESSFULL","Thank you ".$nn.", for creating Account.Please Log in to SnistHub to join the community\n\nYour Details\n\nId:".$id."\nPassword:".$pass."\nName:".$name."\nBranch:".$branch."\nYear:".$year."\n","From: admin@snisthub.com"); 
	header('Location:index.php?error=5');
		}
         else
			 echo $conn->error;
   }else{
   echo "please click on the link again and set your password";
   }
	  }
  }
  else
  {
     if(isset($_GET['id']))
  {
	echo $a=$_GET['id'];
	 
	 $b=$_GET['otp'];
$sql = "SELECT * FROM temp_std where id='$a'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 if($row['otp']==$b)
  { 
   session_start();
	 $_SESSION['tempid']=$a;
	 $_SESSION['tempotp']=$b;
   echo '<form action="signup.php" method="post">
   <br><br><br>
   <input type="password" placeholder="Set Your Password" min-length="8" max-length="20" name="pass">&nbsp&nbsp&nbsp&nbsp
   <input type="submit" name="submit">
   </form>';
  }
		 else{
		 echo "Link broken or Expired!!!";
		 }
  }
  else
	  include 'sign.php';
  }
  
?>
		
	</div>
	</div>
	<?php 
	}
	?>
 </body>
 </html>