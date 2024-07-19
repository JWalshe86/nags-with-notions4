<?php

  class Config {
  
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = 'Sunshine7!';
    private const DBNAME = 'ol5wws00_crudsystem2';

    // Data Source Network
    private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME . '';

    protected $conn = null;

    // Method for connection to the database
    public function __construct(){
       try{
	 $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
	 $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	 echo 'Connected Successfully!';
       } catch(PDOException $e){
          die('Error: ' . $e->getMessage());
       }    
    }
  }


?>
