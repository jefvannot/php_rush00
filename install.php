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
$file_categories = $path."/categories";
if (!file_exists($file_categories))
{
	$my_file_categories = fopen("$file_categories", "x");

	
  $categories[lieu][0] = 'proche';
  $categories[lieu][1] = 'loin';
  $categories[lieu][2] = 'ailleurs';

  $categories[couleur][0] = 'bleu';
  $categories[couleur][1] = 'beige';
  $categories[couleur][2] = 'rouge';
  $categories[couleur][3] = 'ocre';
  $categories[couleur][4] = 'gris';

  $categories[taille][0] = 'petite';
  $categories[taille][1] = 'moyenne';
  $categories[taille][2] = 'grosse';
  $categories[taille][3] = 'naine';


  file_put_contents($file_categories, serialize($categories));

}
?>