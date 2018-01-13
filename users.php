<?php
session_start();
include("auth.php");

$functions = array('login', 'register');

function auth($email, $passwd) {
	$path = "private";
	$file = $path."/passwd";
    if (!file_exists($path))
		mkdir ($path);
	if (file_exists($file))
    	$account = unserialize(file_get_contents($file));
    if (!$account || array_search($email, array_column($account, 'mail')) === false)
    {
        $_SESSION['flag_unknown_mail'] = "ON";
		header('Location: login.php?mail');
        exit();
    }
    if ($account) {
        foreach ($account as $k => $v) {
            if ($v['email'] === $mail && $v['passwd'] === hash('whirlpool', $passwd))
                return $v;
        }
    }
    return false;
}

function login(array $data) {
	if ($data['mail'] == "")
		$error[] = 'mail';
	if ($data['passwd'] == "")
		$error[] = 'passwd';
	if ($error)
	{
		$_SESSION['flag_empty_fields'] = "ON";
		header('Location: login.php?'.implode('&', $error));
		exit();
	}
	if ($user = auth($data['mail'], $data['passwd']))
	{
		$_SESSION['logged_on_user'] = $user['prenom'];
		$_SESSION['nom'] = $user['nom'];
		$_SESSION['mail'] = $user['mail'];
		$_SESSION['flag_log'] = "OK";
		header('Location: index.php');
		exit();
	}
	else
	{
		$_SESSION['flag_bad_passwd'] = "ON";
		$_SESSION['logged_on_user'] = "";
		header('Location: login.php?passwd');
		exit();
	}
}

function create_user(array $data) {
	$path = "private";
	$file = $path."/passwd";
	$new_user['nom'] = $data['nom'];
	$new_user['prenom'] = $data['prenom'];
	$new_user['mail'] = $data['mail'];
	$new_user['passwd'] = hash('whirlpool', $data['passwd1']);

	if (!file_exists($path))
		mkdir ($path);
	if (file_exists($file))
	    $accounts = unserialize(file_get_contents($file));
	if ($accounts && array_search($data['mail'], array_column($accounts, 'mail')) !== false) // plus l'admin a gerer
	{
		$_SESSION['mail_already_registered'] = "ON";
		header('Location: signup.php');
		exit();
	}
	$accounts[] = $new_user;
	file_put_contents($file, serialize($accounts));
	$_SESSION['flag_user_created'] = "OK";
	$_SESSION['logged_on_user'] = $new_user['prenom'];
	header('Location: index.php');
	exit();
}

function register(array $data) {
	$error = NULL;

	if ($data['prenom'] == "")
		$error[] = 'prenom';
	if ($data['nom'] == "")
		$error[] = 'nom';
	if ($data['mail'] == "")
		$error[] = 'mail';
	if ($data['passwd1'] == "")
		$error[] = 'passwd1';
	if ($data['passwd2'] == "")
		$error[] = 'passwd2';
	if ($error)
	{
		$_SESSION['flag_empty_fields'] = "ON";
		header('Location: signup.php?'.implode('&', $error));
		exit();
	}
	if ($data['passwd1'] != $data['passwd2'])
	{
		$_SESSION['flag_cmp_passwd'] = "KO";
		header('Location: signup.php');
		exit();
	}
	create_user($data);
}

if ($_POST['from'] && in_array($_POST['from'], $functions))
	$_POST['from']($_POST);
?>
