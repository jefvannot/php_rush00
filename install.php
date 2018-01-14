<?php
session_start();

/* cree la db users */
$path = "private";
$file = "private/passwd";
if (!file_exists($path))
	mkdir ($path);
if (!file_exists($file))
{
	$admin[nom] = 'admin';
	$admin[prenom] = 'admin';
	$admin[mail] = 'admin@admin';
	$admin[passwd] = hash('whirlpool', "admin");
	$db_users[] = $admin;
	file_put_contents($file, serialize($db_users));
}

/* cree la db planetes sérializée */
$array = file("db/db_planets.csv");
unset($array[0]);
foreach ($array as $elem)
	$db_line[] = explode(";", $elem);
file_put_contents("db/serialized", serialize($db_line));

/* cree la db cathégories */
$file_categories = "db/categories";
if (!file_exists($file_categories))
{
	$my_file_categories = fopen("$file_categories", "x");

	$categories[couleur][0] = 'bleue';
	$categories[couleur][1] = 'verte';
	$categories[couleur][2] = 'orange';
	$categories[couleur][3] = 'rouge';
	$categories[couleur][4] = 'grise';
	$categories[couleur][5] = 'blanche';

	$categories[taille][0] = 'naine';
	$categories[taille][1] = 'petite';
	$categories[taille][2] = 'moyenne';
	$categories[taille][3] = 'grosse';

	file_put_contents($file_categories, serialize($categories));
}
?>