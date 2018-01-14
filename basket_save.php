<?php  
session_start();
$css_path = "./";
$css_file = "basket.css";

$db_planets = unserialize(file_get_contents("db/serialized"));

$_SESSION['nb_articles'] = count($_SESSION['basket']);

if (isset($_SESSION['logged_on_user']) && !empty($_SESSION['logged_on_user']) && $_SESSION['basket'] && $_SESSION['nb_articles'])
{
	$file = "./db/orders";
	$db_orders = unserialize(file_get_contents($file));
	$new[1] = date("j-n-Y H:i:s");
	$new[2] = $_SESSION['logged_on_user'];
	$new[3] = $_SESSION['basket'];
	$db_orders[] = $new;
	file_put_contents($file, serialize($db_orders));
	unset($_SESSION['basket']);
	$_SESSION['basket_saved'] = "OK";
	header('Location: index.php');
	exit();
}
?>
