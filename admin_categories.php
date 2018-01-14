<?php
session_start();
include('partial/admin_only.php');

$css_path = "./";
include('partial/head.php');
include('partial/header.php');
?>
<body>
    <div class="container">
		<h4>Liste des produits</h4>
		<h4>Ajouter un produit</h4>
		<h4>Modifier un produit</h4>
		<h4>Supprimer un produit</h4>
    </div>

    <?php include('partial/footer.php'); ?>
</body>
</html>