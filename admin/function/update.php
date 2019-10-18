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
        $name = $_POST['name'];
        $category_name = $_POST['category_name'];
        $brand_name = $_POST['brand_name'];
        $color_name = $_POST['color_name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $gender = $_POST['gender'];

      if(isset($id) && $id == 0){

        $sql = "INSERT INTO product (name, brand_id, color_id, category_id, image, price, gender) VALUES ('$name', (SELECT id FROM brand WHERE name = '$brand_name'), (SELECT id FROM color WHERE name = '$color_name'), (SELECT id FROM category WHERE name = '$category_name'), '$image', $price, '$gender');";
        $select = mysqli_query($cnx, $sql);

        header('Location: ../index.php');
      }
      if(isset($_POST['update'])){

        $sql_c = "SELECT * FROM color WHERE name = '$color_name'";
        $select_c = mysqli_query($cnx, $sql_c);
        $s_c = mysqli_fetch_assoc($select_c);
        $id_color = intval($s_c['id']);

        $sql_b = "SELECT * FROM brand WHERE name = '$brand_name'";
        $select_b = mysqli_query($cnx, $sql_b);
        $s_b = mysqli_fetch_assoc($select_b);
        $id_brand = intval($s_b['id']);

        $sql_c = "SELECT * FROM category WHERE name = '$category_name'";
        $select_c = mysqli_query($cnx, $sql_c);
        $s_c = mysqli_fetch_assoc($select_c);
        $id_category = intval($s_c['id']);

        
        if(empty($image)){
          $sql_i = "SELECT * FROM product WHERE id = $id";
          $select_i = mysqli_query($cnx, $sql_i);
          $s_i = mysqli_fetch_assoc($select_i);
          $image = $s_i['image'];
        }

        $sql = "UPDATE product SET name = '$name', category_id = '$id_category', brand_id = '$id_brand', color_id = '$id_color', image = '$image', price = $price, gender = '$gender' WHERE id = $id";
        $select = mysqli_query($cnx, $sql);

        header('Location: ../index.php');

      }
      if(isset($_POST['delete'])){

        $sql ="DELETE FROM stock WHERE product_id = $id";
        $_sql = "DELETE FROM product WHERE id = $id";

        $select = mysqli_query($cnx, $sql);
        $_select = mysqli_query($cnx, $_sql);

        header('Location: ../index.php');
      }
      ?>
    </main>
    <script type="text/javascript" src="./js/javascript"></script>
</body>
</html>
<?php
}
?>