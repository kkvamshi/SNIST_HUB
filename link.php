<?php
  
  include 'connectionnn.php';
  if(isset($_GET['lid']))
  {
	   $a=$_GET['lid'];
       $sql = "SELECT * FROM temp_std where id='$a'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
           $l = $row['link'];
		   echo '<a href="'.$l.'" target="_blank" >Click here</a>';
  }
?>