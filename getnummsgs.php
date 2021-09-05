<?php

error_reporting(0);
include 'session.php';
if(isset($_SESSION['ID'])){
	$pro_id=$_POST['proid'];
include 'connectionnn.php';
$gnm=0;
 $sql="
 select * from messages m1 
JOIN 
( 
    select max(time) as time,user from 
    ( 
        select user1 as user,max(time) as time from `messages` where user2='$id' 
        group by user1 
    ) as t 
    group by user 
    order by time asc 
) m2 
on
m1.user1=m2.user and m1.user2='$id' and m1.time=m2.time
 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($row['status']=='sent')
		 $gnm++;
	}
}
echo $gnm;
}
?>