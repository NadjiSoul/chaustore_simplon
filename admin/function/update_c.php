<?php

session_start();

require_once('../../includes/connect.php');

if(isset($_SESSION['id'])){
  $id = $_GET['id'];
    ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <main>
    <?php
    if(!empty($_POST['name']) 
      && !empty($_POST['category_name']) 
      && !empty($_POST['brand_name'])
      && !empty($_POST['color_name'])
      && !empty($_POST['price'])
      && !empty($_POST['gender'])){

        $name = $_POST['name'];
        $category_name = $_POST['category_name'];
        $brand_name = $_POST['brand_name'];
        $color_name = $_POST['color_name'];
        $price = $_POST['price'];
        $gender = $_POST['gender'];

      if(isset($id) && $id == 0){

        $sql = "INSERT INTO category SET name = $name;";
        $select = mysqli_query($cnx, $sql);

        header('Location: ../index.php');
      }
      if(isset($_POST['update_c'])){

        $sql = "UPDATE category SET name = '$name', price = '$price', gender = '$gender' WHERE id = $id";

        $select = mysqli_query($cnx, $sql);

            header('Location: ../index.php');
        }
      if(isset($_POST['delete'])){

        $sql = "DELETE FROM stock WHERE product_id IN (SELECT id FROM product WHERE category_id IN (SELECT id FROM category WHERE name = '$name'));";
        $_sql ="DELETE FROM product WHERE category_id IN (SELECT id FROM category WHERE name = '$name');";
        $__sql ="DELETE FROM category WHERE name = '$name';";

        $select = mysqli_query($cnx, $sql);
        $_select = mysqli_query($cnx, $_sql);
        $_select = mysqli_query($cnx, $_sql);

        header('Location: ../index.php');
      }
    }

      ?>
    </main>
    <script type="text/javascript" src="./js/javascript"></script>
</body>
</html>
<?php
}
?>