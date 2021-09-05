<?php

include 'include.php';
include 'session.php';
if(!empty($_FILES['pro']['name'])){
		if(file_exists("profiles/'$id'/pro.jpg"))
			        unlink("profiles/'$id'/pro.jpg");
				else{
					$_SESSION["url"]="profiles/$id/pro.jpg";
				}
		
			$file_name=$_FILES['pro']['name'];
			
         function GetImageExtension($imagetype)
         {
           if(empty($imagetype)) return false;
            switch($imagetype)
           {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
           }
         }
          if (!empty($file_name))
              {
				     
					$file_name=$_FILES['pro']['name'];
				    $temp_name=$_FILES['pro']['tmp_name'];
				    $imgtype=$_FILES['pro']['type'];
					$ext= GetImageExtension($imgtype);
					$path = 'profiles/'.$id.'/pro.jpg';
					if(move_uploaded_file($temp_name,$path)) {
						header('Location:home.php');
		}
	}
}



?>