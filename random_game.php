<?php

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'lordtaco');
define('MYSQL_PASS', 'xxxxxxxxxxxx');
define('MYSQL_DB', 'lordtaco');

$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);	

$get = mysqli_query($conn, "select id from snes_games where active = 1 order by RAND() limit 1");

$res = mysqli_fetch_assoc($get);

$random_game = $res['id'];

mysqli_query($conn, "update snes_games set active = 0 where id = " . $random_game);

if(mysqli_num_rows($get) < 1)
{
	echo 'no games left';
} else {
	echo $random_game;	
}

?>