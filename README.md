# stream-scripts
Some scripts I've written for some interactive features on my Twitch streams.

colorchange.php - Whenever someone redeems or uses the !colorchange command, the name of the color is converted to RGB values via the array found in colors.php. If a valid color is found, the script then interfaces with the Govee public API and sends a command to change both sets of my LED light strips to the selected color.
