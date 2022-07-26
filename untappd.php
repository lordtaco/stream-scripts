<?php

define("ACCESS_TOKEN", "123456");
define("STREAMERBOT_URL", "http://127.0.0.1:8282/DoAction");

date_default_timezone_set('America/New_York');

$post = [
    'bid' => 3883,
    'timezone' => date('T'),
    'gmt_offset' => date('Z') / 3600,
	'rating' => 4,
	'shout' => "Playing " . $argv[1] . " on Twitch: " . $argv[2],
	'foursquare_id' => "5e7b4d99c91df60008e8b168",
	'geolat' => '0.000000',
	'geolng' => '0.000000'
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.untappd.com/v4/checkin/add?access_token=" . ACCESS_TOKEN);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

$decoded = json_decode($server_output);

if($decoded->meta->code == "200")
{
	if($decoded->response->badges->count > 0)
	{
		foreach($decoded->response->badges->items as $badge)
		{
			
			$badge_info = [
				'action' => 
				[
					'id' => '000000000000000000000',
          'name' => 'Untappd Overlay'
				],
				'args' =>
				[
					'badge_name' => $badge->badge_name,
					'badge_img' => $badge->badge_image->lg
				]
			];
			
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, STREAMERBOT_URL);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($badge_info));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_exec($ch);
			curl_close ($ch);
		}
			
	}
}

?>
