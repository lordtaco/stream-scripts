<?php

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
