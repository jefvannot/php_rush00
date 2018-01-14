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
			<h4>Liste des utilisateurs</h4>
			<div>
				<div class="product-choice first-row">
					<p>Prénom</p>
					<p>Nom</p>
					<p>Mail</p>
				</div>
				<?php
				$db = unserialize(file_get_contents("db/serialized"));
				foreach ($db as $elem) {
					echo "<div class='product-choice-row'>";
					echo "<div class='product-choice'>";
					echo "<p>".$elem[prenom]."</p>";
					echo "<p>".$elem[nom]."</p>";
					echo "<p>".$elem[mail]."</p>";
					echo "</div>";
					?>
					<form action="admin_modif_product.php" method="post" style="margin-left: 10px;">
						<input type="hidden" name="user_mail" value="<?php echo $elem[mail]; ?>">
						<button type="submit" class="btn btn-default">modifier</button>
					</form>
					<form action="" method="post">
						<input type="hidden" name="user_mail" value="<?php echo $elem[mail]; ?>">
						<button type="submit" class="btn btn-default">supprimer</button>
					</form>
					<?php
					echo "</div>";
				}
				?>

				<div class="add">
					<form action="admin_create_product.php" method="post">
						<input type="hidden" name="user_mail" value="<?php echo $elem[mail]; ?>">
						<button type="submit" class="btn btn-default">ajouter un compte</button>
					</form>
				</div>

			</div>

		</div>
	</div>

	<?php include('partial/footer.php'); ?>
</body>
</html>