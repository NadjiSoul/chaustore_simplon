<?php

session_start();

?>

<?php require_once('../includes/db.php');?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Chaustore :: Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<div>
		<h1>Bienvenue, <?php echo $_SESSION['username']; ?><h1>
		<a href="disconnect.php">Deconnexion</a>
	</div>
	<?php
		if(isset($_SESSION['username'])){
			$id = $_GET['id'];

			if(isset($_GET['id']) && $_GET['id']>0){
				$sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product, category, brand, color WHERE product.category_id = category.id AND product.brand_id = brand.id AND product.color_id = color.id;";
				$select = mysqli_query($cnx, $sql);
				$s = mysqli_fetch_assoc($select);

				// if(isset($_POST['submit'])){ //
					$name = $_POST['name'];
					$category_name = $_POST['category_name'];
					$brand_name = $_POST['brand_name'];
					$color_name = $_POST['color_name'];
					$price = $_POST['price'];
					$gender = $_POST['gender'];

					$sql ="DELETE FROM stock WHERE product_id = $id";
					$select = mysqli_query($cnx, $sql);
					$sqla = "DELETE FROM product WHERE id = $id";
					$selecta = mysqli_query($cnx, $sqla);

				// } //
	?>
	<div>
		<h2><?php echo $s['name']; ?></h2>
		<ul>
			<li><?php echo $s['category_name'];?></li>
			<li><?php echo $s['brand_name'];?></li>
			<li><?php echo $s['color_name'];?></li>
			<li><?php echo $s['price'];?></li>
			<li><?php echo $s['gender'];?></li>
		</ul>
	</div>
	<form action="admin.php" method="POST">
		<label>Etes vous sûr de vouloir suprimmer cet article ?</label>
		<input class="delete" type="submit" value="Supprimer">
	</form>
	<?php

			}

		}
	else {
		header('Location: index.php');
	}
?>
</body>
</html>

