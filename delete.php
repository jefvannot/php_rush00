<?php
    session_start();
	include('tools/get_db.php');

	$path = "private";
	$file = $path."/passwd";
    $db = get_db($path, $file);
	$key = array_search($_SESSION['mail'], array_column($db, 'mail'));
	unset($db[$key]);
	file_put_contents($file, serialize($db));

    session_destroy();
    
	$_SESSION['flag_user_deleted'] = "OK";
    header('Location: index.php');
    exit();
?>