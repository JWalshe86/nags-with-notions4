<?php

try{
$con = new PDO ("mysql:host=localhost;dbname=ol5wws00_crudsystem2","root","Sunshine7!"); 
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "connected";
}
catch(PDOException $e)
{
echo "error:".$e->getMessage(); 
}

?>
