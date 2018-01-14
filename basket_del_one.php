<?php  
session_start();
$_SESSION['nb_articles']--;
$_SESSION['basket'][$_POST[planet]]--;
if ($_SESSION['basket'][$_POST[planet]] == 0)
{
	$k = array_search($_POST[planet], $_SESSION['basket']);
	unset($_SESSION['basket'][$k]);
}
header('Location: basket.php');
exit();
?>

