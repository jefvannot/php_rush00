<?php
session_start();
include("install.php");

$css_path = "./";
$css_file = "index_about_contact.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
    <div class="container contact">
		<div class="row">
		    <h1>Anywhere on earth</h1>
		</div>
    </div>
    <?php include('partial/footer.php'); ?>
</body>
</html>