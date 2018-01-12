<?php
function db_connect()
{
	$host = "";
	$user = "";
	$pwd = "";
	$db_name = "db";

	$mysqli = mysqli_connect($host, $user, $pwd, $db_name);
	if (mysqli_connect_errno($mysqli))
	{
		echo "Echec de connexion à la base de données : " . mysqli_connect_error();
		return (NULL);
	}
	return $mysqli;
}
?>