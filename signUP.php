<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="static/css/signUP.css">
	<title>Sign Up</title>
</head>
<body>
    <?php
        require('./connection.php');
        if (isset($_POST['signUP_button'])) {
	   echo 'It is working!';
	}

     ?>
	<div class="form">
        <div class="title">
            <p>Sign UP form</p>
        </div>
	<form action="" method='post'>
            <input type='text' name="name" placeholder='Name'>
            <input type='text' name="lastName" placeholder='Last Name'>
            <input type='text' name="email" placeholder='Email'>
            <input type='text' name="password" placeholder='Password'>
            <input type='text' name="confiPassword" placeholder='Confirm Password'>
            <input type='submit' value="Sign UP" name='signUP_button'>
        </form>
        </div>
</body>
</html>
