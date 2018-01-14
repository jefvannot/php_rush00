<?php
session_start();
include("install.php");

$css_path = "./";
$css_file = "index_about_contact.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>

    <div class="container">
   
		<div class="row">
		    <h1>Extraterrestres ?</h1>
		    <h1>Génies du business ?</h1>
		    <h1>Doux rêveurs ?</h1>
		    <h2>Nous sommes un peu tout ça à la fois</h2>
		</div>
    </div>

    <?php include('partial/footer.php'); ?>
</body>
</html>
