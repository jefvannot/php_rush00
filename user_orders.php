<?php
session_start();
$css_path = "./";
$css_file = "admin.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container user-orders">
		<div>
			<h4>Historique de vos commandes</h4>
			<div class="order-list">
				<?php
				include('tools/get_db.php');
				$file = 'db/orders';
				if (!file_exists($file))
				{
					$db = get_db('db', 'db/orders');
					foreach ($db as $elem) {
						if ($elem[2] == $_SESSION['logged_on_user'])
						{
							echo "<div class='one-order'>";
							echo "<div class='elem order-first first-row'><p>".$elem[1]."</p></div>";
							foreach($elem[3] as $name => $qte)
							{

								echo "<div class='elem-row order-row'>";
								echo "<div class='elem order'>";
								echo "<p>".ucfirst($name)."</p>";
								echo "<p>".$qte."</p>";
								echo "</div>";
								echo "</div>";
							}
							echo "</div>";

						}
					}
				}
				else
					echo "<p>Vous n'avez aucun historique de commande</p>";


				?>
			</div>

		</div>
	</div>

	<?php include('partial/footer.php'); ?>
</body>
</html>
