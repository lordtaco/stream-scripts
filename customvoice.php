<?php
require_once('config.php');

$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

if(isset($_GET['username']) && trim($_GET['username']) != '')
{

	if(isset($_GET['setvoice']) && trim($_GET['setvoice']) != '')
	{
		$newvoice = strtolower(trim($_GET['setvoice']));
		$newvoice = str_replace(" ", "-", $newvoice);
		$newvoice_nospace = str_replace(" ", "", strtolower(trim($_GET['setvoice'])));
		
		$voices = file("voices.txt", FILE_IGNORE_NEW_LINES);
		if(in_array($newvoice, $voices))
		{
			$update_voice_query = "INSERT INTO custom_voices (username, voice) VALUES ('" . $_GET['username'] . "', '" . $newvoice . "') ON DUPLICATE KEY UPDATE voice = '" . $newvoice . "'";
			$update_voice = mysqli_query($conn, $update_voice_query);
			if($update_voice)
			{
				echo 'Voice set to ' . $newvoice . ' for @' . $_GET['username'] . '.';
			} else {
				echo 'Could not update voice, something went wrong.';
			}
		} elseif(in_array($newvoice_nospace, $voices)) {
			$update_voice_query = "INSERT INTO custom_voices (username, voice) VALUES ('" . $_GET['username'] . "', '" . $newvoice_nospace . "') ON DUPLICATE KEY UPDATE voice = '" . $newvoice_nospace . "'";
			$update_voice = mysqli_query($conn, $update_voice_query);
			if($update_voice)
			{
				echo 'Voice set to ' . $newvoice_nospace . ' for ' . $_GET['username'] . '.';
			} else {
				echo 'Could not update voice, something went wrong.';
			}
		} else {
			echo 'Voice ' . $newvoice . ' not found.';
		}
	} else {
		$voice = "steveharvey";

		$voice_query = "select voice from custom_voices where username = '" . $_GET['username'] . "'";
		$voice = mysqli_query($conn, $voice_query);

		if(mysqli_num_rows($voice) == 1)
		{
			$v = mysqli_fetch_assoc($voice);
			$voice = $v['voice'];
		}
	
		echo $voice;
	}	
}

?>
