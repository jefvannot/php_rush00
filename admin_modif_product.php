<?php
session_start();
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
			// print_r($db);
			// $k = array_search($_POST[user_mail], array_column($db, 'mail'));
			foreach ($db as $key => $elem) {
				if ($elem[1] == $data[name])
					$k = $key;
			}

			// echo $db[$k][1];
			?>

			<h1>Modifier un profil</h1>
			<form action="admin/manage_users.php" method="post">

				<h4>Nom</h4>
				<input type="text" name="nom" value='<?php echo $db[$k][1]; ?>'>
				<h4>Location</h4>
				<input type="text" name="location" value='<?php echo "truc"; ?>'>
				<h4>Taille</h4>
				<input type="text" name="taille" value='<?php echo "truc"; ?>'>
				<h4>Poids</h4>
				<input type="text" name="poids" value='<?php echo "truc"; ?>'>
				<h4>Couleur</h4>
				<input type="text" name="couleur" value='<?php echo "truc"; ?>'>
				<h4>Path du fichier image</h4>
				<input type="text" name="img_file" value='<?php echo "truc"; ?>'>
				<h4>Prix</h4>
				<input type="text" name="prix" value='<?php echo "truc"; ?>'>



				<button type="submit" class="btn btn-default" value="send">Modifier ce profil</button>
				<input type="hidden" name="oldmail" value="<?php echo $db[$k][mail]; ?>">
				<input type="hidden" name="action" value="update">



			</form>
		</div>
	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>