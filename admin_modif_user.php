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
			<?php
			include('tools/get_db.php');
			$path = "private";
			$file = $path."/passwd";
			$db = get_db($path, $file);
			$k = array_search($_POST[user_mail], array_column($db, 'mail'));
			?>

			<h1>Modifier un profil</h1>
			<form action="admin/manage_users.php" method="post">
				<h4>Prénom</h4>
				<input type="text" name="prenom" value="<?php echo $db[$k][prenom]; ?>">
				<h4>Nom</h4>
				<input type="text" name="nom" value="<?php echo $db[$k][nom]; ?>">
				<h4>E-mail</h4>
				<input type="email" name="mail" value="<?php echo $db[$k][mail]; ?>">
				<button type="submit" class="btn btn-default" value="send">Modifier ce profil</button>
				<input type="hidden" name="oldmail" value="<?php echo $db[$k][mail]; ?>">
				<input type="hidden" name="action" value="update">
			</form>
		</div>
	</div>
	<?php include('partial/footer.php'); ?>
</body>
</html>