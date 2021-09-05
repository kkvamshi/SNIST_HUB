
<?php             
require_once("connectionnn.php");
$groups;
$grpindex;
$sqlggg = "SELECT * from group_members where member_id='$id'";
$resggg = $conn->query($sqlggg);
$numOfGroups=$resggg->num_rows;
$i=0;
	while($rowggg = $resggg->fetch_assoc()){
		$groupId=$rowggg["group_id"];
		$grpindex["$groupId"]=$i;
		$groups[$i]['id']=$rowggg["group_id"];
		$groups[$i]['admin']=$rowggg["admin"];
$sqlgggg = "SELECT * from groups where group_id='".$rowggg['group_id']."'";
$resgggg = $conn->query($sqlgggg);
$rowgggg = $resgggg->fetch_assoc();
		$groups[$i]['name']=$rowgggg["group_name"];
		$groups[$i]['tag']=$rowgggg["group_tag"];
		$groups[$i]['desc']=$rowgggg["group_desc"];
		$groups[$i]['pro_url']=$rowgggg["pro_url"];
		$groups[$i]['cover_url']=$rowgggg["cover_url"];
		$i++;
	}
?>