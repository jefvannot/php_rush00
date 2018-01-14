<?php
session_start();

include("../tools/auth.php");
include('../tools/get_db.php');

function delete(array $data) {
	$path = "../private";
	$file = $path."/passwd";
	$db = get_db($path, $file);
	foreach ($db as $key => $elem) {
		if ($elem[mail] == $data[mail])
			$idx = $key;
	}
	unset($db[$idx]);
	file_put_contents($file, serialize($db));
	header('Location: ../admin_users.php');
	exit();
}

function update(array $data) {
	$path = "../private";
	$file = $path."/passwd";
	$db = get_db($path, $file);
// print_r($data);
	if ($data['mail'] != $data['oldmail']
		&& array_search($data['mail'], array_column($db, 'mail')) !== false)
	{
		$_SESSION['mail_already_registered'] = "ON";
		header('Location: ../admin_modif_user.php');
		exit();
	}
	$key = array_search($data['oldmail'], array_column($db, 'mail'));
	$db[$key]['prenom'] = $data['prenom'];
	$db[$key]['nom'] = $data['nom'];
	$db[$key]['mail'] = $data['mail'];
	file_put_contents($file, serialize($db));
	header('Location: ../admin_users.php');
	exit();
}


function create_user(array $data) {
	$path = "../private";
	$file = $path."/passwd";
	$db = get_db($path, $file);
	$new_user['nom'] = $data['nom'];
	$new_user['prenom'] = $data['prenom'];
	$new_user['mail'] = $data['mail'];
	$new_user['passwd'] = hash('whirlpool', $data['passwd1']);
	if ($db && array_search($data['mail'], array_column($db, 'mail')) !== false) // plus l'admin a gerer
	{
		$_SESSION['mail_already_registered'] = "ON";
		header('Location: ../admin_create_user.php');
		exit();
	}
	$db[] = $new_user;
	file_put_contents($file, serialize($db));
	header('Location: ../admin_users.php');
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
		header('Location: ../admin_create_user.php?'.implode('&', $error));
		exit();
	}
	if ($data['passwd1'] != $data['passwd2'])
	{
		$_SESSION['flag_cmp_passwd'] = "KO";
		header('Location: ../admin_create_user.php');
		exit();
	}
	create_user($data);
}

$action_array = array('register', 'update', 'delete');

if ($_POST['action'] && in_array($_POST['action'], $action_array))
	$_POST['action']($_POST);
?>
