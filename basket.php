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

		if ($_SESSION['basket'] && $_SESSION['nb_articles'])
		{
			?>
			<div class="product-choice-top">
				<p style="width: 50px"></p>
				<p>Nom</p>
				<p>Prix U</p>
				<p>Qté</p>
			</div>
			<?php
			foreach ($_SESSION['basket'] as $name => $qte)
			{
				$k = array_search($name, array_column($db_planets, '1'));
				echo "<div class='product-choice-row'>";
				echo "<div class='product-choice'>";
				echo "<div class='pic'><img src='".$db_planets[$k][7]."'' alt=''></div>";
				echo "<p>".ucfirst($db_planets[$k][1])."</p>";
				echo "<p>$ ".$db_planets[$k][8]." K</p>";
				echo "<p>".$qte."</p>";
				echo "</div>";
				$sum += ($db_planets[$k][8] * 10000 * $qte) / 10000;
				?>
				<form action="basket_del_one.php" method="post" style="margin-left: 10px;">
					<input type="hidden" name="planet" value="<?php echo $db_planets[$k][1] ?>">
					<button type="submit" class="btn btn-default">-</button>
				</form>
				<form action="basket_add_one.php" method="post">
					<input type="hidden" name="planet" value="<?php echo $db_planets[$k][1] ?>">
					<button type="submit" class="btn btn-default">+</button>
				</form>
				<?php
				echo "</div>";

			}
			?>
			<div class="total">
				<p>Total</p>
				<p>$ <?php echo $sum; ?> K</p>
			</div>
			<?php
		}
		else
			echo "<p>Votre panier est vide</p>";
		?>

	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>