<?php
session_start();
include("install.php");

$css_path = "./";
$css_file = "index_about_contact.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<?php
	if ($_SESSION['flag_profil_updated'] == "OK")
	{
	echo "<div class='flag'><p>Votre profil a bien été modifié\n</p></div>";
	$_SESSION['flag_profil_updated'] = NULL;
	}

	if ($_SESSION['flag_passwd_updated'] == "OK")
	{
	echo "<div class='flag'><p>Votre mot de passe a bien été modifié\n</p></div>";
	$_SESSION['flag_passwd_updated'] = NULL;
	}

	if ($_SESSION['flag_user_created'] == "OK")
	{
	echo "<div class='flag'><p>Votre compte a bien été créé\n</p></div>";
	$_SESSION['flag_user_created'] = NULL;
	}

	if ($_SESSION['flag_user_deleted'] == "OK")
	{
	echo "<div class='flag'><p>Votre compte a bien été supprimé\n</p></div>";
	$_SESSION['flag_user_deleted'] = NULL;
	}
	if ($_SESSION['basket_saved'] == "OK")
	{
	echo "<div class='flag'><p>Votre panier a bien été sauvegardé\n</p></div>";
	$_SESSION['basket_saved'] = NULL;
	}
	?>
    <div class="container index">
   
    	<a href="products.php">
		<div class="row">
		    <h1>Il y a tant de mondes à posséder</h1>
		    <h2>Nous avons tant à vous offrir</h2>
		</div>
		</a>
    </div>

    <?php include('partial/footer.php'); ?>
</body>
</html>
