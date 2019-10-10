<?php

session_start();

require_once('./includes/connect.php');

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $_id = $_GET['id'];
    if($_id == 0){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email' WHERE id = $id";
        $select = mysqli_query($cnx, $sql);
    }
    if($_id == 1){
        $firstname = $_POST['firstname'];
        $sql = "UPDATE user SET firstname = '$firstname' WHERE id = $id";
        $select = mysqli_query($cnx, $sql);
        header('Location: account.php');
    }
    if($_id == 2){
        $lastname = $_POST['lastname'];
        $sql = "UPDATE user SET lastname = '$lastname' WHERE id = $id";
        $select = mysqli_query($cnx, $sql);
        header('Location: account.php');
    }
    if($_id == 3){
        $username = $_POST['username'];
        $sql = "UPDATE user SET username = '$username' WHERE id = $id";
        $select = mysqli_query($cnx, $sql);
        header('Location: account.php');
    }
    if($_id == 4){
        $email = $_POST['email'];
        $sql = "UPDATE user SET email = '$email' WHERE id = $id";
        $select = mysqli_query($cnx, $sql);
        header('Location: account.php');
    }
} 
else {
    header('Location: login.php');
}
?>