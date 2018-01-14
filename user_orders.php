<?php
session_start();
$css_path = "./";
$css_file = "admin.css";
include('partial/head.php');
include('partial/header.php');
?>
<body>
	<div class="container">
		<div>
			<h4>Vos commandes</h4>
			<div>
				<div class="elem user-top first-row">
					<p>Date</p>
					<p>Articles</p>
				</div>
				<?php
				include('tools/get_db.php');
				$db = get_db('db', 'db/orders');
				foreach ($db as $elem) {
					if ($elem[2] == $_SESSION['logged_on_user'])
					{
					echo "<div class='elem-row user-row'>";
					echo "<div class='elem user'>";
					echo "<p>".$elem[1]."</p>";
					foreach($elem[3] as $name => $qte)
						echo "<p>".$name.":".$qte."</p>";
					echo "</p>";
					echo "</div>";
					echo "</div>";
					}
				}
				?>
			</div>

		</div>
	</div>

	<?php include('partial/footer.php'); ?>
</body>
</html>
