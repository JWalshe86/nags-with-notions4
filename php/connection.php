<?php
    class crud{
        public static function connect()
        {
           try {
		   $con=new PDO('mysql:localhost=host; dbname=ol5wws00_crudsystem2','root','Sunshine7!');
		   return $con;
           } catch (PDOException $error1) {
                echo 'Something went wrong, with you connection!'.$error1->getMessage();
           }catch (Exception $error2){
                 echo 'Generic error!'.$error2->getMessage();
           }
        }
	public static function Selectdata()
	{
	    $data=array();
            $p=crud::connect()->prepare('SELECT * FROM crudtable');	
	    $p->execute();
	    $data=$p->fetchAll(PDO::FETCH_ASSOC);
	    return $data;
	}
	public static function delete($id)
	{
	    $p=crud::connect()->prepare('DELETE FROM crudtable WHERE id=:id');
	    $p->bindValue(':id',$id);
	    $p->execute();
	
	}
        public static function userDataPerId($id)
{
    $data=array();
    $p=crud::connect()->prepare('SELECT * FROM crudtable WHERE id=:id');
    $p->bindValue(':id',$id);
    $p->execute();
   $data=$p->fetch(PDO::FETCH_ASSOC);
   return $data;
}

    }

?>
