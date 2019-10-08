<?php

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
    <div>
        <ul>
            <li><?php echo $s['firstname']; ?></li>
            <li><?php echo $s['lastname']; ?></li>
            <li><?php echo $s['username']; ?></li>
            <li><?php echo $s['email']; ?></li>
        </ul>
    </div>
    <?php
    }
    ?>
</body>
</html>
