<?php
session_start();
$css_path = "./";
$css_file = "products.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container">

		<?php
		$file = "db/categories";
		$categories = unserialize(file_get_contents($file));
		?>

		<div class="filter_box">
			<h2>Quelle planète choisir ?</h2>
			<!-- <form method='post' action='product_filter.php'> -->
				<div class="categories">
					<?php
					foreach ($categories as $k => $v)
					{
						echo "<form method='post' action='products.php'>";
						echo "<div class='title'>";
						echo "<h4>".$k."</h4>";
						echo "<hr>";
						foreach ($v as $elem)
							echo "<div class='check'><input type='checkbox' name='".$elem."' checked='checked'><p>".$elem."</p></div>";
						echo "</div>";
						echo "<input type='hidden' name ='cat' value='".$k."'/>";
						echo "<input type='submit' name ='submit' value='Filtrer'/>";
						echo "</form>";
					} 
					?>
				</div>
				<!-- <input type='submit' name ='submit' value='Filtrer'/> -->
				<!-- </form> -->
			</div>

			<div class="products-list">
				<?php
				if (isset($_POST) && !empty($_POST))
				{
					// print_r($_POST);
					$serialized = unserialize(file_get_contents("db/serialized"));
					if ($_POST[cat] == 'couleur')
						$cat = 5;
					if ($_POST[cat] == 'taille')
						$cat = 3;
					foreach ($serialized as $elem) {
						if (in_array($elem[$cat], array_keys($_POST)))
							$tab[] = $elem;
					}
					$db_planets = $tab;
					// print_r($serialized);
					// echo "<br><br>";
					// print_r($tab);
					// echo "<br><br>";

				}
				else
					$db_planets = unserialize(file_get_contents("db/serialized"));

        		// print_r ($db_planets);
				foreach ($db_planets as $planet)
				{
					echo "<a href='show_planet.php?planet=".$planet[1]."' title='".$planet[1]."'>";
					echo "<div class='card'>";
					echo "<div class='title'><h2>".$planet[1]."</h2></div>";
					echo "<img src='".$planet[6]."'>";
					echo "</div>";
					echo "</a>";
				}
				?>

			</div>

		</div>
		<?php include('partial/footer.php'); ?>

	</body>
	</html>