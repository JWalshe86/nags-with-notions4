<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="static/css/signUP.css">
	<title>Login</title>
<style>
    .form{
    width: 230px;
    height: 280px;

}
</style>
</head>
<body>
        <?php
             require('./connection.php');
	     if (isset($_POST['login_button']))  {
		 $_SESSION['validate']=false;
	         $name=$_POST['name'];
	         $password=$_POST['password'];
		 $p=crud::conect()->prepare('SELECT * FROM CRUDTables WHERE name=:n and pass=:p');
		 $p->bindValue(':n', $name);
		 $p->bindValue(':p', $password);
		 $p->execute();
		 $d=$p->fetchAll(PDO::FETCH_ASSOC);
		 if ($p->rowCount()>0) {
	             $_SESSION['name']= $name;
	             $_SESSION['password']= $password;
		     $_SESSION['validate']=true;
		     header('location:home.php');		 
		 }else{
		    echo'Make sure that you are registered!';
		 }

	     }
         ?>

	<div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
	<form action="" method='post'>
            <input type='text' name="name" placeholder='Name'>
            <input type='text' name="password" placeholder='Password'>
            <input type='submit' value="login" name='login_button'>
        </form>
        </div>
</body>
</html>
