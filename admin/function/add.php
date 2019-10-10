<?php

session_start();

require_once('../../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Chaustore :: Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
    	<div>
    		<h1>Bienvenue, <?php echo $_SESSION['username']; ?><h1>
    		<a href="../../includes/disconnect.php">Deconnexion</a>
    	</div>
    </header>
	<?php
		if(isset($_SESSION['id'])){
            if($_GET['id']== 0){
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $category_name = $_POST['category_name'];
                    $brand_name = $_POST['brand_name'];
                    $color_name = $_POST['color_name'];
                    $price = $_POST['price'];
                    $gender = $_POST['gender'];

                    if($name&&$category_name&&$brand_name&&$color_name&&$price&&$gender){
                        $sql = "INSERT INTO product (name, brand_id, color_id, category_id, price, gender) VALUES ('$name', (SELECT id FROM brand WHERE name = '$brand_name'), (SELECT id FROM color WHERE name = '$color_name'), (SELECT id FROM category WHERE name = '$category_name'), $price, '$gender');";
                        $select = mysqli_query($cnx, $sql);
                        header('Location: ../index.php');
                    }
            }
    ?>
    <form method="POST">
        <label>Nom</label>
        <input type="text" name="name">
        <label>Categorie</label>
        <select name="category_name">
            <?php       
                $sqla = 'SELECT * FROM category';
                $selecta = mysqli_query($cnx, $sqla);
                while($sa = mysqli_fetch_assoc($selecta)){
            ?>
            <option><?php echo $sa['name'];?></option>
            <?php
            }
            ?>
        </select>
        <label>Marque</label>
        <select name="brand_name">
            <?php       
                $sqla = 'SELECT * FROM brand';
                $selecta = mysqli_query($cnx, $sqla);
                while($sa = mysqli_fetch_assoc($selecta)){
            ?>
            <option><?php echo $sa['name'];?></option>
            <?php
            }
            ?>
        </select>
        <label>Couleur</label>
        <select name="color_name">
            <?php       
                $sqla = 'SELECT * FROM color';
                $selecta = mysqli_query($cnx, $sqla);
                while($sa = mysqli_fetch_assoc($selecta)){
            ?>
            <option><?php echo $sa['name'];?></option>
            <?php
            }
            ?>
        </select>
        <label>Prix</label>
        <input type="text" name="price">
        <label>Genre</label>
        <select name="gender">
            <option>H</option>
            <option>F</option>
        </select>
        <input class="add" type="submit" name="submit" value="Ajouter">
    </form>
<?php
            }
            else{
                echo 'Une erreur est survenue';
            }
        }
        else{
            header('Location: index.php');
        }
?>
</body>
</html>

