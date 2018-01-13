<?php
session_start();

function	get_signup_form_data()
{
	echo "<br><br>tets<br><br>";
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
		&& $_POST['submit'] && $_POST['submit'] == "send")
	{
	echo "IN !!!";
		$new_user['nom'] = $_POST['nom'];
    	$new_user['prenom'] = $_POST['prenom'];
    	$new_user['mail'] = $_POST['mail'];
		$new_user['passwd'] = hash('whirlpool', $_POST['passwd1']);
	}
// print_r($new_user);
	return ($new_user);
}

// echo $_POST['prenom']."<br>";
// echo $_POST['nom']."<br>";
// echo $_POST['mail']."<br>";
// echo $_POST['passwd1']."<br>";
// echo $_POST['passwd2']."<br>";
// echo $_POST['submit']."<br>";
// $path = "private";
// $file = $path."/passwd";
// print_r($_POST);

$new_user = get_signup_form_data();
// if (!file_exists($path))
// 	mkdir ($path);

print_r($new_user);



// if (!file_exists($file))
// {
// 	$unserialized[] = $new_user;
// 	$serialized[] = serialize($unserialized);
// 	file_put_contents($file, $serialized);
// $_SESSION['flag_user_created'] = "OK";
// 	header('Location: signup.php');
// 	exit();
// }
// else
// {
// 	$unserialized = unserialize(file_get_contents($file));
// 	foreach ($unserialized as $elem)
// 	{
// 		foreach ($elem as $mail=>$value)
// 		{
// 			if ($value == $new_user['mail'])
// 			{
// 				$_SESSION['flag_mail'] = "KO";
// 				header('Location: signup.php');
// 				exit();
// 			}
// 		}
// 	}
// 	$unserialized[] = $new_user;
// 	$serialized = serialize($unserialized);
// 	file_put_contents($file, $serialized);
// $_SESSION['flag_user_created'] = "OK";
// 	header('Location: signup.php');
// 	exit();





// if (!file_exists($file))
// {
// 	$unserialized[] = $new_user;
// 	$serialized[] = serialize($unserialized);
// }
// else
// {
// 	$unserialized = unserialize(file_get_contents($file));
// 	foreach ($unserialized as $elem)
// 	{
// 		foreach ($elem as $mail => $value)
// 		{
// 			if ($value == $new_user['mail'])
// 			{
// 				$_SESSION['flag_mail'] = "KO";
// 				header('Location: signup.php');
// 				exit();
// 			}
// 		}
// 	}
// 	$unserialized[] = $new_user;
// 	$serialized = serialize($unserialized);
// }
// file_put_contents($file, $serialized);
// $_SESSION['flag_user_created'] = "OK";
// header('Location: signup.php');
// exit();



if (file_exists($file))
    $accounts = unserialize(file_get_contents($file));
if ($accounts && array_search($_POST['mail'], array_column($accounts, 'mail')) !== false)
{
	$_SESSION['flag_mail'] = "KO";
	header('Location: signup.php');
	exit();
}
$accounts[] = $new_user;
// $serialized[] = serialize($accounts);
// file_put_contents($file, $serialized);
file_put_contents($file, serialize($accounts));
$_SESSION['flag_user_created'] = "OK";
header('Location: signup.php');
echo "OK\n";
exit();








?>