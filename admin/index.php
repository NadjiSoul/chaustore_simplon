<?php

session_start();

require_once('../includes/connect.php');

if(isset($_SESSION['id'])){
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>Chaustore :: Admin</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <main>
        <nav>
            <h3 class="home">Bienvenue, <?php echo $_SESSION['username']; ?></h3>
            <ul>
                <li><a href="">Ajouter un admin</a></li>
                <li><a href="">Mon compte</a></li>
                <li><a href="./includes/disconnect.php">Se deconnecter</a></li>
            </ul>
        </nav>
        <button class="add" onclick="bloc('form');">Ajouter</button>
        <form method="POST" action='./function/update.php?id=0' id='form' style="display: none;">
            <label>Nom</label>
            <input type="text" name="name">
            <label>Categorie</label>
            <select name="category_name">
                <?php       
                    $sqla = 'SELECT * FROM category ORDER BY id DESC';
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
                    $sqla = 'SELECT * FROM brand ORDER BY name ASC';
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
                    $sqla = 'SELECT * FROM color ORDER BY name ASC';
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
        <section id="section_a">    
        <?php
            $sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product, category, brand, color WHERE product.category_id = category.id AND product.brand_id = brand.id AND product.color_id = color.id ORDER BY name ASC;";

            $select = mysqli_query($cnx, $sql);
            while($s = mysqli_fetch_assoc($select)){
        ?>
              <form method="POST" action="./function/update.php?id=<?php echo $s['id']; ?>" class="form_bloc">
                <div class="rr">
                  <div>
                    <input type="text" name="name" value="<?php echo $s['name']; ?>">
                    <input type="text" name="category_name" value="<?php echo $s['category_name']; ?>">
                    <input type="text" name="brand_name" value="<?php echo $s['brand_name']; ?>"> 
                    <input type="text" name="color_name" value="<?php echo $s['color_name']; ?>">
                    <input type="text" name="price" value="<?php echo $s['price']; ?>"> 
                    <input type="text" name="gender" value="<?php echo $s['gender']; ?>">
                </div>
                <div>
                  <img src="">
                  <input type="file" name="">
                </div>
                </div>
                <div class ="button">
                  <input type="submit" name="update" value="Modifier">
                  <input type="submit" name="delete" value="Supprimer">
                </div>
            </form>
        <?php
            }
        ?>
        </section>
        <div id="cat">
          <h3>Categorie</h3>
          
        <?php
            $sql = "SELECT * FROM category";
            $select = mysqli_query($cnx, $sql);
            while($s = mysqli_fetch_assoc($select)){
        ?>
              <form method="POST" action="./function/update_a.php?id=<?php echo $s['id']; ?>">
                  <input type="text" name="name" value="<?php echo $s['name']; ?>">
                  <input type="submit" name="update_c" value="Modifier">
                  <input type="submit" name="delete_c" value="Supprimer">
              </form>
        <?php
            }
        ?>
        </div>
    </main>
    <script type="text/javascript" src="./js/script.js"></script>
<?php
}
else{
  header('Location: login.php');
}
?>
</body>
</html>
