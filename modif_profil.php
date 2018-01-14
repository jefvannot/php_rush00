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
			if ($_SESSION['mail_already_registered'] == "ON")
			{
				echo "<div class='error-login'><p>Désolé, un compte existe déjà avec cette nouvelle adresse mail\n</p></div>";
				$_SESSION['mail_already_registered'] = NULL;
			}
			?>
			<h1>Mon profil</h1>
			<form action="users.php" method="post">
				<h4>Prénom</h4>
				<input type="text" name="prenom" value="<?php echo $_SESSION['logged_on_user'] ?>">
				<h4>Nom</h4>
				<input type="text" name="nom" value="<?php echo $_SESSION['nom'] ?>">
				<h4>E-mail</h4>
				<input type="email" name="mail" value="<?php echo $_SESSION['mail'] ?>">
				<button type="submit" class="btn btn-default" value="send">Modifier mon profil</button>
				<!-- <input type="submit" name = "submit" value="Envoyer" /> -->
				<input type="hidden" name="action" value="profil_update">
				<!-- <input type="hidden" name="success" value="login"> -->
			</form>
		</div>
	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>

