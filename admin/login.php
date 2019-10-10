<?php

session_start();

require_once('../includes/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chaustore :: Admin</title>
</head>
<body>
    <?php
    	if(isset($_POST['login'])){
    		$username = $_POST['username'];
            $pass = $_POST['pass'];

            $sql = "SELECT * FROM admin WHERE (username = '$username' OR email = '$username') AND password = '$pass'";
            $select = mysqli_query($cnx, $sql);
            if($username&&$pass){
            	if($s = mysqli_fetch_assoc($select)){
	                $user = $s['username'];
	                $email = $s['email'];
	                $pw = $s['password'];
	                if(($username==$user || $username==$email)&&$pass==$pw){
	                    $_SESSION['username'] = $username;
	                    $_SESSION['pass'] = $pass;
	                    $_SESSION['id'] = $s['id'];
	                    header('Location: index.php');
	                }
            	}
            }
    	}
    ?>
    <form method="POST" id="forma">
        <input type="text" name="username" placeholder="pseudo ou mail">
        <input type="password" name="pass" placeholder="votre mot de passe...">
        <input type="submit" name="login">
    </form>
</body>
</html>