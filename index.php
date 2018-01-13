<?php
session_start();
include("install.php");

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
	?>
    <div class="container">
   

		<div class="row">
		        trucs a vendre
		</div>
    </div>

    <?php include('partial/footer.php'); ?>
</body>
</html>
