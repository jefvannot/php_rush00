<?php
session_start();

function	get_signup_form_data()
{
	if (!isset($_POST['prenom'])
		|| !isset($_POST['nom'])
		|| !isset($_POST['mail'])
		|| !isset($_POST['passwd1'])
		|| !isset($_POST['passwd2']))
	{
		$_SESSION['flag_champs'] = "KO";
		header('Location: signup.php');
		exit();
	}
	else if ($_POST['passwd1'] != $_POST['passwd2'])
	{
		$_SESSION['flag_passwd'] = "KO";
		header('Location: signup.php');
		exit();
	}
	else if ($_POST['nom'] != "admin" 
		&& $_POST['prenom'] != "admin" 
		&& $_POST['mail'] != "admin"
		&& $_POST['passwd1'] != "admin"
		&& $_POST['passwd2'] != "admin"
		&& $_POST['passwd1'] == $_POST['passwd2']
		&& $_POST['submit'] === "send")
	{
		$new_user['nom'] = $_POST['nom'];
    	$new_user['prenom'] = $_POST['prenom'];
    	$new_user['mail'] = $_POST['mail'];
		$new_user['passwd'] = hash('whirlpool', $_POST['passwd1']);
	}
	return ($new_user);
}

$path = "../private";
$file = $path."/passwd";

$new_user = get_signup_form_data();
if (!file_exists($path))
	mkdir ($path);
if (file_exists($file))
{
	$users = unserialize(file_get_contents($file));
	foreach ($users as $v)
	{
		foreach ($v as $mail => $value)
		{
			if ($value == $new_user['mail'])
			{
				$_SESSION['flag_mail'] = "KO";
				header('Location: signup.php');
				exit();
			}
		}
	}	
}
$users[] = $new_user;
file_put_contents($file, serialize($users);
$_SESSION['flag_user_created'] = "OK";
header('Location: signup.php');
echo "TEDQKUHBDIQ";
exit();

?>