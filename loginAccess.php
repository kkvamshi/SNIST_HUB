<?php
  
  include 'include.php';
  include 'connectionnn.php';
  if(isset($_POST['lid']))
  {
	 $a=$_POST['lid'];
     $b=$_POST['lpw'];	 
	 $c=$_POST['las'];
$sql = "SELECT * FROM $c where id='$a'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
  if($row['pwd']==$b)
  {   
ini_set('session.gc_maxlifetime', 3600036);

session_set_cookie_params(3600036);

session_start(); 
	  $_SESSION['ID']=$_POST['lid'];
	  $_SESSION['nn']=$row['nickname'];
	  $_SESSION['g']=$row['gender'];
	  $_SESSION['branch']=$row['branch'];
	  $_SESSION['year']=$row['year'];
	  $_SESSION['url']=$row['url'];
	  $_SESSION['user']=$c;
	  header('Location:home.php');
  }
  else{
	  header('Location:index.php?error=4');
  }
} else {
    header('Location:index.php?error=3');
}
  }
?>