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

		$sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN brand ON product.brand_id = brand.id INNER JOIN color ON product.color_id = color.id  ORDER BY id DESC;";
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
    				</ul>
    			</div>
                <img src="./img/product/<?php echo $s['image'];?>">
    		</article>
    	<?php
        }
        ?> 
    </section>
</body>
</html>