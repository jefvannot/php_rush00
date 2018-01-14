<?php  
session_start();
$_SESSION['nb_articles']++;
$_SESSION['basket'][$_POST[planet]]++;
header('Location: basket.php');
exit();
?>