# stream-scripts
Some scripts I've written for some interactive features on my Twitch streams.

colorchange.php - Whenever someone redeems or uses the !colorchange command, the name of the color is converted to RGB values via the array found in colors.php. If a valid color is found, the script then interfaces with the Govee public API and sends a command to change both sets of my LED light strips to the selected color.

random_game.php - This script selects a random number from a set number of records in a MySQL table, and marks them as inactive once selected. This way, each number is randomly selected only once per stream. That number is then passed to an event in Touch Portal, which then runs a Powershell script that loads a corresponding rom file with that name.
