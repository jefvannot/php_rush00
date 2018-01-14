<?php
session_start();
include("install.php");

$css_path = "./";
$css_file = "index_about_contact.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>

    <div class="container about">
   
		<div class="row">
		    <h1>Votre planete est...</h1>
		    <h2>Trop petite ?</h2>
		    <h2>Trop rose ?</h2>
		    <h2>Pas assez extravagante ?</h2>
		    <h1>Nous fabriquons des planetes sur mesure et sur place !</h1>
		    <h3>Toutes vos envies de planetes en or, platine ou caoutchouc</h3>
		</div>
    </div>

    <?php include('partial/footer.php'); ?>
</body>
</html>
