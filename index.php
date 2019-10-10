<?php

session_start();

require_once('./includes/connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chaustore</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php require_once('./includes/header.php');?>
	<section>
		<?php

		$sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product, category, brand, color WHERE product.category_id = category.id AND product.brand_id = brand.id AND product.color_id = color.id ORDER BY product.name ASC;";
        $select = mysqli_query($cnx, $sql);

        while($s = mysqli_fetch_assoc($select)){
    	?>
    		<article>
    			<div class="div">
    				<h3><?php echo $s['name']; ?></h3>
    				<ul>
    					<li><?php echo $s['category_name']; ?></li>
    					<li><?php echo $s['brand_name']; ?></li>
    					<li><?php echo $s['color_name']; ?></li>
    					<li><?php echo $s['price']; ?></li>
    					<li><?php echo $s['gender']; ?></li>
    					<div class="image"><?php echo $s['image'];?></div>
    				</ul>
    			</div>
    		</article>
    	<?php
        }
        ?> 
    </section>
</body>
</html>