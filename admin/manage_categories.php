<?php
session_start();

function delete(array $data) {
	$file = "../db/categories";
	$db = unserialize(file_get_contents($file));
	$idx = array_search($data[name], $db[$data[cat_gpe]]);
	unset($db[$data[cat_gpe]][$idx]);
	file_put_contents($file, serialize($db));
	header('Location: ../admin_categories.php');
	exit();
}

function update(array $data) {
	$file = "../db/categories";
	$db = unserialize(file_get_contents($file));
	$idx = array_search($data[oldname], $db[$data[cat_gpe]]);
	$db[$data[cat_gpe]][$idx] = $data[newname];
	file_put_contents($file, serialize($db));
	header('Location: ../admin_categories.php');
	exit();
}


function create(array $data) {
	$file = "../db/categories";
	$db = unserialize(file_get_contents($file));
	$db[$data[cat_gpe]][] = $data[name];
	file_put_contents($file, serialize($db));
	header('Location: ../admin_categories.php');
	exit();
}


$action_array = array('create', 'update', 'delete');

if ($_POST['action'] && in_array($_POST['action'], $action_array))
	$_POST['action']($_POST);
?>
