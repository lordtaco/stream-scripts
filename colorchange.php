<?php

define('GOVEE_API_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('GOVEE_API_URL', 'https://developer-api.govee.com/v1/devices/control');
define('GOVEE_MODEL', 'H6159');
define('GOVEE_SHELF_LIGHTS', '00:00:00:00:00:00:00:00');
define('GOVEE_CONSOLE_LIGHTS', '00:00:00:00:00:00:00:00');

require_once('colors.php');

$color = preg_replace("/[^a-z\ ]+/", "", strtolower($_GET['color']));

if(array_key_exists($color, $colors) === true)
{
	$red = $colors[$color][0];
	$green = $colors[$color][1];
	$blue = $colors[$color][2];
	
	setGoveeLights(GOVEE_SHELF_LIGHTS, $red, $green, $blue);
	setGoveeLights(GOVEE_CONSOLE_LIGHTS, $red, $green, $blue);
	echo 'Lights changed to ' . $color; 
	if(isset($_GET['username']) && $_GET['username'] != '')
	{
		echo ' by ' . $_GET['username'] . '.';
	}
} else {
	echo 'Color ' . $color . ' not found.';	
}

function setGoveeLights($device, $red, $green, $blue)
{
	
	$curl = curl_init();	
	curl_setopt_array($curl, array(
	CURLOPT_URL => GOVEE_API_URL,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",	
	CURLOPT_MAXREDIRS => 10,
  	CURLOPT_TIMEOUT => 30,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_CUSTOMREQUEST => "PUT",
  	CURLOPT_POSTFIELDS => '{ "device": "' . $device . '", "model": "' . GOVEE_MODEL . '", "cmd": { "name": "color", "value": { "r": ' . $red . ', "g": ' . $green . ', "b": ' . $blue . ' }}}',
	CURLOPT_HTTPHEADER => array(
    	"cache-control: no-cache",
    	"Content-Type: application/json",
    	"Govee-API-Key: " . GOVEE_API_KEY
  		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
	
}

?>