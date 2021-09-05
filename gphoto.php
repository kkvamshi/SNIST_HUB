
<?php
include 'session.php';
require_once("connectionnn.php");
			$file_name=$_FILES['pro']['name'];
if( (!empty($_FILES['pro']['name'])) && isset($_GET['grpid']) ){
$grpid=$_GET['grpid'];
			if(file_exists("groups/".$grpid."pro.jpg"))
			        unlink("groups/".$grpid."pro.jpg");
            if (!empty($file_name))
            {
					$file_name=$_FILES['pro']['name'];
				    $temp_name=$_FILES['pro']['tmp_name'];
				    $imgtype=$_FILES['pro']['type'];
					$path = "groups/".$grpid."pro.jpg";
					if(move_uploaded_file($temp_name,$path)) {
						echo 'yes';
                        
$msg="<b>$nn</b> changed group profile";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
					}
			}
}



?>