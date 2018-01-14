<?php
session_start();

function delete(array $data) {
	$file = "../db/serialized";
	$db = unserialize(file_get_contents($file));
	foreach ($db as $key => $elem) {
		if ($elem[1] == $data[name])
			$idx = $key;
	}
	unset($db[$idx]);
	file_put_contents($file, serialize($db));
	header('Location: ../admin_products.php');
	exit();
}

function update(array $data) {
	// $path = "../private";
	// $file = $path."/passwd";
	// $db = get_db($path, $file);
// print_r($data);
	$file = "../db/serialized";
	$db = unserialize(file_get_contents($file));
	// if ($data['mail'] != $data['oldmail']
	// 	&& array_search($data['mail'], array_column($db, 'mail')) !== false)
	// {
	// 	$_SESSION['mail_already_registered'] = "ON";
	// 	header('Location: ../admin_modif_user.php');
	// 	exit();
	// }
	$key = array_search($data['oldmail'], array_column($db, 'mail'));
	$db[$key]['prenom'] = $data['prenom'];
	$db[$key]['nom'] = $data['nom'];
	$db[$key]['mail'] = $data['mail'];
	file_put_contents($file, serialize($db));
	header('Location: ../admin_products.php');
	exit();
}


function create_user(array $data) {
	$file = "../db/serialized";
	$db = unserialize(file_get_contents($file));
	$new[1] = $data['nom'];
	$new[2] = $data['location'];
	$new[3] = $data['taille'];
	$new[4] = $data['poids'];
	$new[5] = $data['couleur'];
	$new[6] = $data['img_file'];
	$new[7] = $data['prix'];
	$db[] = $new;
	file_put_contents($file, serialize($db));
	header('Location: ../admin_products.php');
	exit();
}

function register(array $data) {
	$error = NULL;
	if ($data['nom'] == "")
		$error[] = 'nom';
	if ($data['location'] == "")
		$error[] = 'location';
	if ($data['taille'] == "")
		$error[] = 'taille';
	if ($data['poids'] == "")
		$error[] = 'poids';
	if ($data['couleur'] == "")
		$error[] = 'couleur';
	if ($data['img_file'] == "")
		$error[] = 'img_file';
	if ($data['prix'] == "")
		$error[] = 'prix';
	if ($error)
	{
		$_SESSION['flag_empty_fields'] = "ON";
		header('Location: ../admin_create_user.php?'.implode('&', $error));
		exit();
	}
	create_user($data);
}

$action_array = array('register', 'update', 'delete');

if ($_POST['action'] && in_array($_POST['action'], $action_array))
	$_POST['action']($_POST);
?>
