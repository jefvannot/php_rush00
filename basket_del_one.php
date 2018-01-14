<?php  
session_start();
$_SESSION['nb_articles']--;
// unset($_SESSION['basket']);
// print_r($_SESSION['basket']);
// echo $_POST[planet]." = ";
// echo count($_SESSION['basket'][$_POST[planet]])."<br>";
// print_r($_SESSION['basket'][$_POST[planet]]);
$_SESSION['basket'][$_POST[planet]]--;
if ($_SESSION['basket'][$_POST[planet]] == 0)
{
	// echo "IN";
	$k = array_search($_POST[planet], $_SESSION['basket']);
	unset($_SESSION['basket'][$k]);
}
// print_r($_SESSION['basket']);

header('Location: basket.php');
exit();
?>

