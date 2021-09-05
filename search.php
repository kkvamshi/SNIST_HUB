<?php 
include 'session.php';
require_once("connectionnn.php");
$pid=$_POST["key"];
$sql = "SELECT id,name,nickname,url from students where id LIKE '%$pid%' or name LIKE '%$pid%' or nickname LIKE '%$pid%' union SELECT id,name,nickname,url from staff where id LIKE '%$pid%' or name LIKE '%$pid%' or nickname LIKE '%$pid%' union SELECT id,name,nickname,url from clubs where id LIKE '%$pid%' or name LIKE '%$pid%' or nickname LIKE '%$pid%'";
$res = $conn->query($sql);
$coms="";
$i=0;
while($i<20 && $row1 = $res->fetch_assoc()){

		$coms.='<div class="s" onclick="select(/'.$row1["name"].'/,/'.$row1["id"].'/)" ><div><img height="30" onclick=select("'.$row1["name"].'","'.$row1["id"].'") class="simg" width="30" src="'.$row1["url"].'"/></div>
		      <div class="sinfo"><font class="snn"><b>#$$$#'.$row1["nickname"].'#^^^#</b></font><br><font class="sname">#$$$#'.$row1["name"].'#^^^#</font>&nbsp&nbsp&#10022&nbsp<font class="sid">#$$$#'.$row1["id"].'#^^^#</font>
          	  </div></div>';
			  $i++;
}
	print $coms;
	

?>