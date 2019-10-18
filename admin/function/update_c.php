<?php

session_start();

require_once('../../includes/connect.php');

if(isset($_SESSION['id'])){
  $id = $_GET['id'];
  $choice = $_POST['choice'];
    ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <main>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['choice'])){

        $name = $_POST['name'];
        $choice = $_POST['choice'];
        var_dump($_POST);

      if(isset($id) && $id == 0){
        $sql = "INSERT INTO $choice SET name = '$name';";
      }
      else if(isset($_POST['update_c']) && $id > 0){
        $sql = "UPDATE $choice SET name = '$name' WHERE id = $id";
      }
      else if(isset($_POST['delete_c']) && $id > 0){
        $sql = "DELETE FROM $choice WHERE id = $id";
      }
      $select = mysqli_query($cnx, $sql);
      header('Location: ../index.php');
    }

      ?>
    </main>
    <script type="text/javascript" src="./js/javascript"></script>
</body>
</html>
<?php
}
else {
  header('Location: ../index.php');
}
?>