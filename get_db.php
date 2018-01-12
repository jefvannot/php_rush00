<?php
	$array = file("db/db_planets.csv");
	unset($array[0]);
	foreach ($array as $elem)
		$infos_bdd[] = explode(";", $elem);
	$serialized = serialize($infos_bdd);
	file_put_contents("db/serialized", $serialized);
?>
