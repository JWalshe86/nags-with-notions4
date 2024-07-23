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
   // Fetch all images method
   public function fetchAllImages(){
	   $sql = 'SELECT * FROM gallery ORDER BY id DESC';
	   $stmt = $this->conn->prepare($sql);
	   $stmt->execute();
	   $rows = $stmt->fetchAll();
	   return $rows;
   }
     // Fetch single image method
   public function fetchImage($id){
     $sql = 'SELECT * FROM gallery WHERE id = :id';
     $stmt = $this->conn->prepare($sql);
     $stmt->execute(['id' => $id]);
     $row = $stmt->fetch();
     return $row;       
     } 

    // Update image method
      public function updateImage($id, $at, $ip){
        $sql = 'UPDATE gallery SET alt_text = :alt_text, image_path = :image_path WHERE id = :id';
	$stmt = $this->conn->prepare($sql);
	$stmt->execute([
	  'alt_text'=>$at,
	  'image_path'=>$ip,
	  'id' => $id
	]);
	return true;
      }
  // Delete image method
  public function removeImage($id){
    $sql = 'DELETE FROM gallery WHERE id = :id';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    return true;
  }
  }


?>
