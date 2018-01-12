<?php
session_start();
$_SESSION['acheter'] = "";

$path = "private";
$file = "private/passwd";
if (!file_exists($path))
{
  mkdir ($path);
  $my_file = fopen("$file", "x");

  $tab[0][nom] = 'admin';
  $tab[0][prenom] = 'admin';
  $tab[0][mail] = 'admin';
  $tab[0][passwd] = hash('whirlpool', "admin");

  $serialized[] = serialize($tab);
  file_put_contents($file, $serialized);
}
include("./get_db.php");

$file_categories = $path."/categories";
if (!file_exists($file_categories))
{
  $my_file_categories = fopen("$file_categories", "x");

  // $location[] = 'systeme solaire';
  // $location[] = 'plus loin';
  // $location[] = 'bien plus loin';

  // $color[] = 'bleu';
  // $color[] = 'beige';

  // $taille[] = 'petite';
  // $taille[] = 'moyenne';
  // $taille[] = 'grosse';
  $categories[lieu][0] = 'systeme solaire';
  $categories[lieu][1] = 'plus loin';
  $categories[lieu][2] = 'bien plus loin';

  $categories[couleur][0] = 'bleu';
  $categories[couleur][1] = 'beige';

  $categories[taille][0] = 'petite';
  $categories[taille][1] = 'moyenne';
  $categories[taille][2] = 'grosse';
  
  // $categories[lieu] = $location;
  // $categories[couleur] = $color;
  // $categories[taille] = $taille;

  file_put_contents($file_categories, serialize($categories));
}

// echo "<meta http-equiv='refresh' content='0,url=index.php'>";
?>