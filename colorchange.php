<?php
require_once('config.php');
require_once('functions.php');
require_once('colors.php');

$color_found = 0;
$chosen_color = "";
$color = preg_replace("/[^a-z\ ()\/&\-\'’]+/", "", strtolower($_GET['color']));

if(array_key_exists($color, $colors) === true)
{
	$chosen_color = $color;	
	$color_found = 1;
	
} elseif($color == "random") {
	$chosen_color = array_rand($colors);	
	$color_found = 1;
} else {
	echo 'Color ' . $color . ' not found.';	
}

if($color_found == 1)
{
	$red = $colors[$chosen_color][0];
	$green = $colors[$chosen_color][1];
	$blue = $colors[$chosen_color][2];

	if(isset($_GET['save']) && $_GET['save'] == 'true')
	{
		$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);	
		mysqli_query($conn, "update `" . TABLE_NAME . "` set red = " . $red . ", green = " . $green . ", blue = " . $blue . " where id = 1"); 
		mysqli_close($conn);
	}
	
	setGoveeLights(GOVEE_SHELF_LIGHTS, $red, $green, $blue);
	setGoveeLights(GOVEE_CONSOLE_LIGHTS, $red, $green, $blue);
	echo 'Lights changed to ' . $chosen_color; 
	if(isset($_GET['username']) && $_GET['username'] != '')
	{
		echo ' by ' . $_GET['username'] . '.';
	}

}

?>
