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

		$sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name FROM product 
            INNER JOIN category ON product.category_id = category.id 
            INNER JOIN brand ON product.brand_id = brand.id
            ORDER BY id DESC";
        $select = mysqli_query($cnx, $sql);
        while($s = mysqli_fetch_assoc($select)){
    	?>
    		<article>
    			<div class="div">
    				<h3><?php echo $s['name']; ?></h3>
    				<ul>
    					<li> Categorie : <?php echo $s['category_name']; ?></li>
    					<li> Marque : <?php echo $s['brand_name']; ?></li>
    					<li> Prix : <?php echo $s['price']; ?> €</li>
    					<li> Genre :                            
                    <?php   if($s['gender'] == 'F'){
                                echo 'Femme';
                            }
                            if($s['gender'] == 'H'){
                                echo 'Homme';
                            }
                    ?>       
                        </li>
                        
                <?php
                            $name = $s['name'];
                            $_sql = "SELECT sum(stock) AS somme FROM stock 
                            INNER JOIN product ON product.id = stock.product_id
                            INNER JOIN size ON size.id = stock.size_id
                            WHERE product.name = '$name'";
                            $_select = mysqli_query($cnx, $_sql);
                            $_s = mysqli_fetch_assoc($_select);
                            //echo $_s['somme'];

                            if($_s['somme'] <= 0){
                            ?>
                            <li style="background-color: red;">Indisponible</li>
                            <?php
                            }
                            else if($_s['somme'] <= 10){
                            ?>
                            <li style="background-color: orange;">Bientot épuisé</li>
                            <?php
                            }
                            else{
                            ?>
                             <li style="background-color: green;">Disponible</li>
                             <?php                      
                            }
                        ?>
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