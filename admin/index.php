<?php

session_start();

require_once('../includes/connect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
        <div>
            <h1>Bienvenue, <?php echo $_SESSION['username']; ?><h1>
            <a href="./includes/disconnect.php">Deconnexion</a>
        </div>
    </header>
<?php
    if(isset($_SESSION['id'])){
?>
    <main>
        <table>
            <tr>
                <td>Nom</td>
                <td>Categorie</td>
                <td>Marque</td>
                <td>Couleur</td>
                <td>Prix</td>
                <td>Genre</td>
                <td><button class="add" onclick="location.href='./function/add.php?id=0'">Ajouter</button></td>
            </tr>
        <?php   
            $sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product, category, brand, color WHERE product.category_id = category.id AND product.brand_id = brand.id AND product.color_id = color.id;";

            $select = mysqli_query($cnx, $sql);

            while($s = mysqli_fetch_assoc($select)){
        ?>
            <tr>
                <td><?php echo $s['name']; ?></td>
                <td><?php echo $s['category_name']; ?></td>
                <td><?php echo $s['brand_name']; ?></td>
                <td><?php echo $s['color_name']; ?></td>
                <td><?php echo $s['price']; ?></td>
                <td><?php echo $s['gender']; ?></td>
                <td>
                    <button class ="update" onclick="location.href='./function/update.php?id=<?php echo $s['id']; ?>'">Modifier</button>
                    <button class ="delete" onclick="location.href='./function/delete.php?id=<?php echo $s['id']; ?>'">Supprimer</button>
                </td>
            </tr>
        <?php
            }
        ?>    
        </table>
        <div>
            <ul>
                <li><a href=""><h3>Categorie</h3></a></li>
                <li><a href=""><h3>Marque</h3></a></li>
                <li><a href=""><h3>Couleur</h3></a></li>
                <li><a href=""><h3>Taille</h3></a></li>
                <li><a href=""><h3>Stock</h3></a></li>
            </ul>
        </div>
    </main>
<?php
    }
    else{
        header('Location: login.php');
    }
?>
</body>
</html>