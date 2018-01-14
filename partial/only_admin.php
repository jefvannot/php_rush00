<?php
if ($_SESSION['logged_on_user'] != "admin")
{
	header('Location: index.php');
	exit();
}
?>