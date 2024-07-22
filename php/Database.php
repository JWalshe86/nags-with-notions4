<?php

  require_once 'config.php';

  class Database extends Config{
  
	  // Insert data into database
   public function uploadImage($alt_text, $img_path){
     $sql = "INSERT INTO gallery (alt_text, image_path) VALUES (:alt_text, :img_path)";
     $stmt = $this->conn->prepare($sql);
     $stmt->execute(['alt_text'=>$alt_text, 'img_path'=>$img_path]);
     return true;
   
   }
  
  }

?>
