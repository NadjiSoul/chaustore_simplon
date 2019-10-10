<?php

session_start();

require_once('./includes/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chaustore</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <?php require_once('./includes/header.php'); ?>
    <?php
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM user WHERE id = $id";
        $select = mysqli_query($cnx, $sql);
        $s = mysqli_fetch_assoc($select);
    ?>
    <h2>Votre Compte :</h2>
        <form method="POST" action="update.php?id=1">  
            <input type="text" name="firstname" value="<?php echo $s['firstname']; ?>">
            <input type="submit" class="img_update" value="">
        </form>
        <form method="POST" action="update.php?id=2">
            <input type="text" name="lastname" value="<?php echo $s['lastname']; ?>">
            <input type="submit" class="img_update" value="">
        </form>
        <form method="POST" action="update.php?id=3"> 
            <input type="text" name="username" value="<?php echo $s['username']; ?>">
            <input type="submit" class="img_update" value="">
        </form>
        <form method="POST" action="update.php?id=4">     
            <input type="text" name="email" value="<?php echo $s['email']; ?>">
            <input type="submit" class="img_update" value="">
        </form>
    <?php
    }
    else{
        header('Location: login.php');
    }
    ?>
</body>
</html>
