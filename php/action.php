<?php

  require_once 'util.php';
  require_once 'Database.php';
  $util = new Util;
  $db = new Database;
/* // to handle ajax request */
if(isset($_POST['image_upload'])){
  echo 'testw';
   $alt_text = $util->testInput($_POST['altText']);

   $image_name = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp = $_FILES['image']['tmp_name'];

   $image_ext = explode('.', $image_name);
   $image_ext = strtolower(end($image_ext));

   $allowed_ext = ['jpg', 'jpeg', 'png'];

   $target_dir = 'uploads/';
   $image_unique_name = uniqid().'.'.$image_ext;
   $image_path = $target_dir . $image_unique_name;


   if(!file_exists($image_path)){
     if(in_array($image_ext, $allowed_ext)){
       if($image_size <= 1000000){
         if(move_uploaded_file($image_tmp, $image_path)){
	   $db->uploadImage($alt_text, $image_unique_name);
	   echo $util->showMessage('success', 'Image uploaded successfully!'); 
	  }
	 }else{
            echo $util->showMessage('danger', 'Image size should be less or equal to 1MB!');
	 }
               } else{
            echo $util->showMessage('danger', 'Image type not supported!');
	   }
     } else { 
          echo $util->showMessage('danger', 'Image already exists in the database!');
    }
   }

?>
