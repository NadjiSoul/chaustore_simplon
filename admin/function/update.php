<?php

session_start();

?>

<?php 
	require_once('../includes/db.php');
?>
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
		<a href="../../includes/disconnect.php">Deconnexion</a>
	</div>
	<?php
		if(isset($_SESSION['id'])){

			if(isset($_GET['id']) && $_GET['id']>0){
				$sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product, category, brand, color WHERE product.category_id = category.id AND product.brand_id = brand.id AND product.color_id = color.id;";
				$select = mysqli_query($cnx, $sql);
				$s = mysqli_fetch_assoc($select);

			$msg ="";
			if(!empty($_POST)){
				if(empty($_POST['name'])){
        			$msg .="The name is required.<br/>";
   				}
   				if(empty($_POST['price'])){
        			$msg .="The price is required.<br/>";
    			}
				if(empty($msg)){
					$id = $_GET['id'];
					$name = $_POST['name'];
					$category_name = $_POST['category_name'];
					$brand_name = $_POST['brand_name'];
					$color_name = $_POST['color_name'];
					$price = $_POST['price'];
					$gender = $_POST['gender'];

					$sql ="UPDATE product SET name='$name',price=$price, gender='$gender' WHERE id = $id";
					$select = mysqli_query($cnx, $sql);
					$sqla ="UPDATE  category, product SET name='$category_name' WHERE category.id = $id AND product.category_id";
					$selecta = mysqli_query($cnx, $sqla);
				}
			}
			echo $msg;

	?>
	<form method="POST">
		<label>Nom</label>
		<input type="text" name="name" value="<?php echo $s['name']; ?>">
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
		<input type="text" name="price" value="<?php echo $s['price']; ?>">
		<label>Genre</label>
		<select name="gender">
			<option>H</option>
			<option>F</option>
		</select>
		<input class="update" type="submit" name="" value="Modifier">
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

