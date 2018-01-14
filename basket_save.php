<?php  
session_start();
$css_path = "./";
$css_file = "basket.css";
include('partial/head.php');
include('partial/header.php'); 
?>
<body>
	<div class="container">
		<?php
		$db_planets = unserialize(file_get_contents("db/serialized"));

		$_SESSION['nb_articles'] = count($_SESSION['basket']);

		if (isset($_SESSION['logged_on_user']) && $_SESSION['basket'] && $_SESSION['nb_articles'])
		{
			$file = "./db/orders";
			$db_orders = unserialize(file_get_contents($file));
			$new[1] = date(DATE_ATOM);
			$new[2] = $_SESSION['logged_on_user'];
			$new[3] = $_SESSION['basket'];
			$db_orders[] = $new;
			file_put_contents($file, serialize($db_orders));
			echo "<p>Panier sauvegarde</p>";
			unset($_SESSION['basket']);
			exit();
		}
		else if (!isset($_SESSION['logged_on_user']))
		{
			print_r($_SESSION);
			echo "<p>Veuillez vous connecter avant de valider</p>";
		}
		else
			echo "<p>Votre panier est vide</p>";
		?>
	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>
