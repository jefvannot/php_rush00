<?php
session_start();
include('partial/admin_only.php');

$css_path = "./";
$css_file = "admin.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container">
		<div>
			<h4>Liste des produits</h4>
			<div>
				<div class="elem product first-row">
					<p>Nom</p>
					<p style='flex:2;'>Location</p>
					<p>Taille</p>
					<p style='flex:2;'>Poids</p>
					<p>Couleur</p>
					<p style='flex:2;'>Fichier Image</p>
					<p>Prix $</p>
				</div>
				<?php
				$db = unserialize(file_get_contents("db/serialized"));
				foreach ($db as $v) {
					echo "<div class='elem-row product-row'>";
					echo "<div class='elem product'>";
					echo "<p>".ucfirst($v[1])."</p>";
					echo "<p style='flex:2;'>".$v[2]."</p>";
					echo "<p>".$v[3]."</p>";
					echo "<p style='flex:2;'>".$v[4]."</p>";
					echo "<p>".$v[5]."</p>";
					echo "<p style='flex:2;'>".$v[6]."</p>";
					echo "<p>".$v[7]." K</p>";
					echo "</div>";
					?>
					<form action="admin_modif_product.php" method="post" style="margin-left: 10px;">
						<input type="hidden" name="name" value="<?php echo $v[1]; ?>">
						<button type="submit" class="btn btn-default">modifier</button>
					</form>
					<form action="admin/manage_products.php" method="post">
						<input type="hidden" name="name" value="<?php echo $v[1]; ?>">
						<input type="hidden" name="action" value="delete">
						<button type="submit" class="btn btn-default">supprimer</button>
					</form>
					<?php
					echo "</div>";
				}
				?>

				<div class="add">
					<form action="admin_create_product.php" method="post">
						<button type="submit" class="btn btn-default">ajouter un produit</button>
					</form>
				</div>

			</div>

		</div>
	</div>

	<?php include('partial/footer.php'); ?>
</body>
</html>