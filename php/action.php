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
         if(compress($image_tmp, $image_path, 70)){
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

   // Handle fetch all images ajax request
   if(isset($_POST['fetch_all_images'])){
     $images = $db->fetchAllImages();

     if($images){
       foreach($images as $row){
         $output .= '<div class="col-sm-6 col-md-4 col-lg-3">
		       <a href="#" class="open_image" id="'.$row['id'].'"
                       data-bs-toggle="modal" data-bs-target="#image_preview_modal">
		       <img src="uploads/'.$row['image_path'].'" alt="'.$row['alt_text'] .'"
		       class="img-fluid rounded-0 img-thumbnail">
			       </a>
		    </div>';
       }
       echo $output;
     }echo '<div class="col-lg-12">
           <h1 class="text-center -4">No images found in the database!</h1>
	     </div>';
   }

   // Handle set image in modal ajax request
   if(isset($_POST['image_id'])){
     $id = $_POST['image_id'];
     $image = $db->fetchImage($id);
     echo json_encode($image);
   }


   // Handle edit image ajax request
   if(isset($_POST['edit_image'])){
     $id = $_POST['id'];
     $image = $db->fetchImage($id);
     // converts array into json format & sends to client
     echo json_encode($image);
   }

   //Handle update image ajax request
   if(isset($_POST['update_image_upload'])){
     print_r($_POST);
     print_r($_FILES);
   }





   // Compress image function
  function compress($source, $destination, $quality){
    $info = getimagesize($source);
     
    if($info['mime'] == 'image/jpeg'){
      $image = imagecreatefromjpeg($source);
    }elseif($info['mime'] == 'image/png'){
      $image = imagecreatefrompng($source);
    }
     
    imagejpeg($image, $destination, $quality);
    return $destination;

  }
?>
