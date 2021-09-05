<?php 
include "session.php";
if($_SESSION['ID']=='15311a05q2' || $_SESSION['ID']=='admin'){
$rnd=rand(10000000,99999999);
echo $_SESSION['randid']=$rnd;
include "mailss.php";
sendMail("all",$_GET['prv'],"adminmail",$_GET['msg'],$rnd);
echo 'djghjdgd';
}
?>