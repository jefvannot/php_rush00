<?php  
session_start();

$k = array_search($_POST[planet], $_SESSION['basket']);
unset($_SESSION['basket'][$k]);

header('Location: basket.php');
exit();
?>

