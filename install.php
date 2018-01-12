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

  $tab_cat[cat1][0] = 'systeme solaire';
  $tab_cat[cat1][1] = 'loin';
  $tab_cat[cat2][0] = 'plus loin';
  $tab_cat[cat2][1] = 'plus plus loin';

  $serialized_cat[] = serialize($tab_cat);
  file_put_contents($file_categories, $serialized_cat);
}

echo "<meta http-equiv='refresh' content='0,url=index.php'>";
?>