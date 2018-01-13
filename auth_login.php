<?php
	session_start();
	include("auth_check.php");

	if ($user = auth($_POST['mail'], $_POST['passwd']))
	{
		$_SESSION['logged_on_user'] = $user['prenom'];
		$_SESSION['nom'] = $user['nom'];
		$_SESSION['mail'] = $user['mail'];
		// $_SESSION['passwd'] = $user['passwd']);
		$_SESSION['flag_log'] = "OK";
		header('Location: index.php');
	}
	else
	{
		$_SESSION['flag_log'] = "KO";
		$_SESSION['logged_on_user'] = "";
		header('Location: login.php');
		echo "ERROR\n";
	}
?>
