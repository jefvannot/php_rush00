<?php
session_start();
if ($_SESSION['logged_on_user'] != "admin")
{
	header('Location: index.php');
	exit();
}

$css_path = "./";
$css_file = "signup_login.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container modif-product">
		<div class="log-box">
			<?php
			$file = "db/serialized";
			$db = unserialize(file_get_contents($file));
			foreach ($db as $key => $elem) {
				if ($elem[1] == $_POST[name])
					$k = $key;
			}
			?>
			<h1>Modifier un profil</h1>
			<form action="admin/manage_products.php" method="post">

				<h4>Nom</h4>
				<input type="text" name="nom" value='<?php echo $db[$k][1]; ?>'>
				<h4>Location</h4>
				<input type="text" name="location" value='<?php echo $db[$k][2]; ?>'>
				<h4>Taille</h4>
				<input type="text" name="taille" value='<?php echo $db[$k][3]; ?>'>
				<h4>Poids</h4>
				<input type="text" name="poids" value='<?php echo $db[$k][4]; ?>'>
				<h4>Couleur</h4>
				<input type="text" name="couleur" value='<?php echo $db[$k][5]; ?>'>
				<h4>Path du fichier image</h4>
				<input type="text" name="img_file" value='<?php echo $db[$k][6]; ?>'>
				<h4>Prix</h4>
				<input type="text" name="prix" value='<?php echo $db[$k][7]; ?>'>
				<button type="submit" class="btn btn-default" value="send">Modifier ce profil</button>
				<input type="hidden" name="id" value='<?php echo $k; ?>'>
				<input type="hidden" name="action" value="update">
			</form>
		</div>
	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>