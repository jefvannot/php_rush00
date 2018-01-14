<?php
session_start();
if ($_SESSION['logged_on_user'] != "admin")
{
	header('Location: index.php');
	exit();
}

$css_path = "./";
$css_file = "admin.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container">
		<div>
			<h4>Catégories</h4>
			<div class="cat-content">
				<?php
				$db = unserialize(file_get_contents("db/categories"));
				foreach ($db as $key => $cat) {
					echo "<div>";
					echo "<div class='elem cat-first first-row'><p>".$key."</p></div>";
					foreach ($cat as $k => $v) {
						echo "<div class='elem-row cat-row'>";
						echo "<div class='elem cat'>";
						echo "<p>".$v."</p>";
						echo "</div>";
						?>
						
						<form action="admin/manage_categories.php" method="post">
							<input type="hidden" name="name" value="<?php echo $v; ?>">
							<input type="hidden" name="cat_gpe" value="<?php echo $key; ?>">
							<button type="submit" class="btn btn-default">supprimer</button>
							<input type="hidden" name="action" value="delete">
						</form>

						<?php
						echo "</div>";
					}
					?>
					<h4>Modifier une catégorie ?</h4>
					<form action="admin/manage_categories.php" method="post" style="margin-left: 10px;">
						<h5>Nom de la catégorie à modifier</h5>
						<input type="text" name="oldname" value="">
						<h5>Nouveau nom</h5>
						<input type="text" name="newname" value="">
						<input type="hidden" name="cat_gpe" value="<?php echo $key; ?>">
						<br><button type="submit" class="btn btn-default">modifier</button>
						<input type="hidden" name="action" value="update">
					</form>
					<h4>Ajouter une catégorie ?</h4>
					<form action="admin/manage_categories.php" method="post" style="margin-left: 10px;">
						<h5>Nom de la nouvelle catégorie</h5>
						<input type="text" name="name" value="">
						<input type="hidden" name="cat_gpe" value="<?php echo $key; ?>">
						<br><button type="submit" class="btn btn-default">ajouter</button>
						<input type="hidden" name="action" value="create">
					</form>
					<?php
					echo "</div>";
				}
				?>



			</div>

		</div>
	</div>

	<?php include('partial/footer.php'); ?>
</body>
</html>