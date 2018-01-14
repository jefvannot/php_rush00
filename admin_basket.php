<?php
session_start();
include('partial/admin_only.php');

$css_path = "./";
$css_file = "admin.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container">
		<div>
			<h4>Liste des commandes</h4>
			<div>
				<div class="elem user-top first-row">
					<p>Date</p>
					<p>User</p>
					<p>Articles</p>
				</div>
				<?php
				include('tools/get_db.php');
				$db = get_db('db', 'db/orders');
				foreach ($db as $elem) {
					echo "<div class='elem-row user-row'>";
					echo "<div class='elem user'>";
					echo "<p>".$elem[1]."</p>";
					echo "<p>".$elem[2]."</p>";
					echo "<p>";
					foreach($elem[3] as $name => $qte)
						echo $name.":".$qte."<br>";
					echo "</p>";
					echo "</div>";
					echo "</div>";
				}
				?>
			</div>

		</div>
	</div>

	<?php include('partial/footer.php'); ?>
</body>
</html>
