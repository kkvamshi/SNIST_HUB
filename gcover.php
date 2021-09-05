
<?php
include 'session.php';
require_once("connectionnn.php");
			$file_name=$_FILES['cover']['name'];
if( (!empty($_FILES['cover']['name'])) && isset($_GET['grpid']) ){
$grpid=$_GET['grpid'];
			if(file_exists("groups/".$grpid."cover.jpg"))
			        unlink("groups/".$grpid."cover.jpg");
            if (!empty($file_name))
            {
					$file_name=$_FILES['cover']['name'];
				    $temp_name=$_FILES['cover']['tmp_name'];
				    $imgtype=$_FILES['cover']['type'];
					$path = "groups/".$grpid."cover.jpg";
					if(move_uploaded_file($temp_name,$path)) {
						echo 'yes';
                                   
$msg="<b>$nn</b> changed group cover";
$query = "insert into `groupnotifications`(`group_id`,`msg`) values('$grpid','$msg')"; 
    $result = $conn->query($query);
					}
			}
}



?>