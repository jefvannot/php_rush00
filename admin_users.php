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
			<h4>Liste des utilisateurs</h4>
			<div>
				<div class="elem user-top first-row">
					<p>Prénom</p>
					<p>Nom</p>
					<p>Mail</p>
				</div>
				<?php
				include('tools/get_db.php');
				$db = get_db('private', 'private/passwd');
				foreach ($db as $elem) {
					echo "<div class='elem-row user-row'>";
					echo "<div class='elem user'>";
					echo "<p>".$elem[prenom]."</p>";
					echo "<p>".$elem[nom]."</p>";
					echo "<p>".$elem[mail]."</p>";
					echo "</div>";
					?>
					<form action="admin_modif_user.php" method="post" style="margin-left: 10px;">
						<input type="hidden" name="user_mail" value="<?php echo $elem[mail]; ?>">
						<button type="submit" class="btn btn-default">modifier</button>
					</form>
					<?php if ($elem[prenom] != 'admin') { ?>
					<form action="admin/manage_users.php" method="post">
						<input type="hidden" name="mail" value="<?php echo $elem[mail]; ?>">
						<input type="hidden" name="action" value="delete">
						<button type="submit" class="btn btn-default">supprimer</button>
					</form>
					<?php } ?>
					<?php
					echo "</div>";
				}
				?>

				<div class="add">
					<form action="admin_create_user.php" method="post">
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