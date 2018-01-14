<?php  
session_start();
$css_path = "./";
$css_file = "show_planet.css";
include('partial/head.php');
include('partial/header.php'); 
?>
<body>
	<div class="container">
		<?php
		$db_planets = unserialize(file_get_contents("db/serialized"));
		if ($db_planets && $_GET[planet] && ($k = array_search($_GET[planet], array_column($db_planets, '1'))) !== false)
		{
			?>
			<!-- <div class="content" style="background-image: url(<?php #echo $db_planets[$k][8]; ?>;"> -->

				<div class="content">
				<div class="pic">
					<img src="<?php echo $db_planets[$k][6]; ?>?time=<?php echo time(); ?>" alt="">
				</div>
				<div class="info">
					<div class="title">
						<h2>La planète <?php echo ucfirst($_GET[planet]) ?></h2>
					</div>
					<p>Location : <?php echo $db_planets[$k][2]; ?></p>
					<p>Taille : <?php echo $db_planets[$k][3]; ?></p>
					<p>Poids : <?php echo $db_planets[$k][4]; ?></p>
					<p>Couleur : <?php echo $db_planets[$k][5]; ?></p>
					<p>Prix : <?php echo $db_planets[$k][7]; ?> K</p>
					<div class="margin">
						<form action="basket_add_one.php" method="post">
							<input type="hidden" name="planet" value="<?php echo $_GET[planet] ?>">
							<button type="submit" class="btn btn-default">Ajouter au panier</button>
						</form>
					</div>
					<div class="margin">
						<a href="products.php" title="">Revenir à la liste de nos produits</a>
					</div>
				</div>
			</div>

			<?php
		}
		else
			header('Location: products.php');
		?>
	</div>
	<?php include('partial/footer.php'); ?>

</body>
</html>