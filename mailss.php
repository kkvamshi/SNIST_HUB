<?php 

include 'session.php';
function sendMail($sto,$prv,$ptype,$msggsm,$randid){
include 'session.php';
	if($randid==$_SESSION['randid']){
	unset($_SESSION['randid']);
	$cnt=0;
	for($i=1;$i<13;$i++){
	$k=fmod($prv,10);
		$prv=($prv-$k)/10;
		if($k==1){
			if($i>0 && $i<5){
			$cnt=1;
			$yra[]="year=".$i;
			}
			else{
			if($cnt==0){
			$cnt=3;}
			if($cnt==1){
			$cnt=2;}
				if($i==5)
					$bra[]="branch='bt'";
				else if($i==6)
					$bra[]="branch='civil'";
				else if($i==7)
					$bra[]="branch='cse'";
				else if($i==8)
					$bra[]="branch='ece'";
				else if($i==9)
					$bra[]="branch='eee'";
				else if($i==10)
					$bra[]="branch='ecm'";
				else if($i==11)
					$bra[]="branch='it'";
				else if($i==12)
					$bra[]="branch='mech'";
					else{}
			
			}
		}
	}
include 'connectionnn.php';
	if($ptype!="adminmail"){
			if($cnt==1){
		$sql="select * from students where ".implode(" or ",$yra);
		}
		else if($cnt==2){
		$sql="select * from students where (".implode(" or ",$yra).") and (".implode(" or ",$bra).")";
		}
		else if($cnt==3){
		$sql="select * from staff where ".implode(" or ",$bra);
		}
		else
			$sql="select * from students where id='15311a05q2'";
$result100 = $conn->query($sql);
		
if ($result100->num_rows > 0) {
	
	while($row = $result100->fetch_assoc())
	{
		//$flname=$row["name"];
		$eemail[]=$row["email"];
	}
	$mmsgg= '
<html>
<head>
  <title>SNISTHUB NOTIFICATION</title>
</head>
<body>
<h1 style="font-family: Times New Roman, Times, serif;">HELLO <b><i>SNISTHUB USER</b></i>,</h1>
<p style="font-family: Times New Roman, Times, serif; font-size:22px; line-height:2.0; text-align:justify;">New post in <b>'.$ptype.'</b> Timeline,<br>
Posted by <i>'.$id.'('.$nn.')</i><br>
Login to Snisthub.com to have a look.</p><br><br><br><br><p>
Do not reply to this mail</p>
</body>
</html>
';
$subject="SNISTHUB NOTIFICATION";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: SNISTHUB <no-reply@snisthub.com>';
	
mail(implode(",",$eemail), $subject, $mmsgg, implode("\r\n", $headers));
	}
	

	}
	else{
			if($cnt==1){
		$sql="select * from students where ".implode(" or ",$yra);
		}
		else if($cnt==2){
		$sql="select * from students where (".implode(" or ",$yra).") and (".implode(" or ",$bra).")";
		}
		else if($cnt==3){
		$sql="select * from staff where ".implode(" or ",$bra);
		}
		else
			$sql="select * from students where id='15311a05q2'";
$result100 = $conn->query($sql);
		
if ($result100->num_rows > 0) {
	while($row = $result100->fetch_assoc())
	{
		//$flname=$row["name"];
		$eemail[]=$row["email"];
	}
	$mmsgg= '
<html>
<head>
  <title>SNISTHUB NOTIFICATION</title>
</head>
<body>
<h1 style="font-family: Times New Roman, Times, serif;">HELLO <b><i>SNISTHUB USER</b></i>,</h1>
<p style="font-family: Times New Roman, Times, serif; font-size:22px; line-height:1.0; text-align:justify;">
'.$msggsm.'

</p><br><br><br><br><p>
Do not reply to this mail</p>
</body>
</html>
';
$subject="SNISTHUB NOTIFICATION";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: SNISTHUB <no-reply@snisthub.com>';
	mail(implode(',',$eemail), $subject, $mmsgg, implode("\r\n", $headers));
	echo implode(' ',$eemail);
}
}
	}
else echo "not equal";	
}
?>