<?php

session_start();

require_once('./includes/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chaustore</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a class="deroul" href="">Categorie</a>
					<ul class="sous">
						<?php
						$sql = "SELECT * from category ORDER BY name ASC;";
						$select = mysqli_query($cnx, $sql);
						while($s = mysqli_fetch_assoc($select)){
						?>
						<li><a href="<?php echo $s['name'].'.php'; ?>"><?php echo $s['name'];?></a></li>
						<?php
						}
						?>
					</ul>	
				</li>
				<li><a class="deroul" href="">Marque</a>
					<ul class="sous">
						<?php
						$sql = "SELECT * from brand ORDER BY name ASC;";
						$select = mysqli_query($cnx, $sql);
						while($s = mysqli_fetch_assoc($select)){
						?>
						<li><a href="<?php echo $s['name'].'.php'; ?>"><?php echo $s['name'];?></a></li>
						<?php
						}
						?>
					</ul>	
				</li>
				<li><a class="deroul" href="">Genre</a>
					<ul class="sous">
						<li><a href="women.php">Femme</a></li>
						<li><a href="men.php">Homme</a></li>
						<li><a href="none.php">Non-binaire</a></li>
					</ul>	
				</li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">A propos</a></li>
				<li>
					<?php
					if(isset($_SESSION['id'])){
					?>
						<a class="deroul" href="">Bienvenue</a>
						<ul class="sous">
							<li><a href="./account.php">Mon Compte</a></li>
							<li><a href="./includes/disconnect.php">Se deconnecter</a></li>
						</ul>
					<?php
					}
					else{
					?>
						<li><a href="./login.php">Se connecter</a></li>
					<?php
					}
					?>
				</li>
			</ul>
		</nav>
	</header>
</body>
</html>