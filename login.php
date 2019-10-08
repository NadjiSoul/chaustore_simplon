<?php

session_start();

require_once('./includes/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<button onclick="bloca('forma');">Se connecter</button>
    <button onclick="blocb('formb');">S'enregistrer</button>
	<?php
	    if(isset($_POST['create'])){
	    	$firstname = $_POST['firstname'];
	        $lastname = $_POST['lastname'];
	        $username = $_POST['username'];
	        $pass = sha1($_POST['pass']);
	        $password = sha1($_POST['password']);
	        $email = $_POST['email'];

	        if($firstname&&$lastname&&$username&&$email&&$pass&&$password){
	            if($pass == $password){
	            	$sql = "INSERT INTO `user` SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', password = '$pass'";
	                $select = mysqli_query($cnx, $sql);
	            }
	        }
	    }
	?>

    <!-- REGISTER -->

    <form method="POST" id="formb" style="display: none;">
        <input type="text" name="firstname">
        <input type="text" name="lastname">
        <input type="text" name="username">
        <input type="text" name="email">
        <input type="password" name="pass">
        <input type="password" name="password">
        <div>
            <input type="checkbox" name="checkbox" required>
            <label for="checkbox">J'accepte les <a href="">Conditions Générales d'Utilisations</a></label>
        </div>
        <input type="submit" name="create">
    </form>

    <?php
    	if(isset($_POST['login'])){
    		$username = $_POST['username'];
            $pass = sha1($_POST['pass']);

            $sql = "SELECT * FROM user WHERE (username = '$username' OR email = '$username') AND password = '$pass'";
            $select = mysqli_query($cnx, $sql);
            if($username&&$pass){
            	if($s = mysqli_fetch_assoc($select)){
	                $user = $s['username'];
	                $email = $s['email'];
	                $pw = $s['password'];
	                if(($username==$user || $username==$email)&&$pass==$pw){
	                    $_SESSION['firstname'] = $s['firstname'];
	                    $_SESSION['lastname'] = $s['lastname'];
	                    $_SESSION['email'] = $s['email'];
	                    $_SESSION['firstname'] = $s['firstname'];
	                    $_SESSION['username'] = $username;
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
    <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>