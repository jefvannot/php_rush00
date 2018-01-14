<?php
session_start();
$css_path = "./";
$css_file = "signup_login.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container">
		<div class="log-box">

			<?php
			if ($_SESSION['flag_empty_fields'] == "ON")
			{
				echo "<div class='error-login'><p>Veuillez remplir tous les champs çi-dessous\n</p></div>";
				$_SESSION['flag_empty_fields'] = NULL;
			}
			?>
			<h1>Créer un nouveau produit</h1>
			<form action="admin/manage_products.php" method="post">
			<input type="text" name="nom" placeholder="Nom">
				<input type="text" name="location" placeholder="Location">
				<input type="text" name="taille" placeholder="Taille">
				<input type="text" name="poids" placeholder="Poids">
				<input type="text" name="couleur" placeholder="Couleur">
				<input type="text" name="img_file" placeholder="Chemin du fichier image">
				<input type="text" name="prix" placeholder="Prix">

<!-- 				<input type="text" name="nom" value="<?php echo str_shuffle('qwerty'); ?>">
				<input type="text" name="location" value="<?php echo str_shuffle('qwerty'); ?>">
				<input type="text" name="taille" value="<?php echo str_shuffle('qwerty'); ?>">
				<input type="text" name="poids" value="<?php echo str_shuffle('qwerty'); ?>">
				<input type="text" name="couleur" value="<?php echo str_shuffle('qwerty'); ?>">
				<input type="text" name="img_file" value="<?php echo str_shuffle('qwerty'); ?>">
				<input type="text" name="prix" value="<?php echo str_shuffle('qwerty'); ?>"> -->

				<button type="submit" class="btn btn-default" value="send">Créer</button>
				<input type="hidden" name="action" value="register">
			</form>
		</div>
	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>

