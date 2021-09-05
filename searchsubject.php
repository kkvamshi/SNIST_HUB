<?php 
error_reporting(0);
include 'session.php';
if(!isset($_SESSION['ID'])){
	header('Location:index.php?error=2');
}
require_once("connectionnn.php");
$pid=$_POST["key"];
$sql = "SELECT * from subjects where sub_name LIKE '%$pid%'";
$res = $conn->query($sql);
$r=$res->num_rows;
$perPage = 15;
$page = 1;
$x=0;
$new=0;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
$posts = $_GET["posts"];
$x=$r-$posts;
if($x>0)
$new=1;
}
$start = (($page-1)*$perPage)+$x;
if($start < 0) $start = 0;
if(!empty($_GET["pp"])) {
	$start=$start+2;
	$perPage=1;
}
$query =  $sql . " limit " . $start . "," . $perPage; 
$result = $conn->query($query);
$pages = $r/15;
if ($result->num_rows > 0) {
		echo '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />
		<input type="hidden" class="posts" value="' . $r . '" />';
    		
	while($row = $result->fetch_assoc())
	{
		$sub=$row["sub_name"];
		$abcd='';
		$abcd='<a class="nts" href="viewnotes.php?sub='.$sub.'" >';
		$abcd.='<div id="'.$sub.'" style="overflow:hidden;" class="sn mdl-js-ripple-effect"><span class="mdl-ripple"></span>
		<div class="sn-name">#$$$#'.$sub.'#^^^#</div>';
		$abcd.='</div></a>';
		
		echo $abcd;
	}
}

?>