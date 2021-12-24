# stream-scripts
Some scripts I've written for some interactive features on my Twitch streams.

colorchange.php - Whenever someone redeems or uses the !colorchange command, the name of the color is converted to RGB values via the array found in colors.php. If a valid color is found, the script then interfaces with the Govee public API and sends a command to change both sets of my LED light strips to the selected color.

random_game.php - This script selects a random number from a set number of records in a MySQL table, and marks them as inactive once selected. This way, each number is randomly selected only once per stream. That number is then passed to an event in Touch Portal, which then runs a Powershell script that loads a corresponding rom file with that name.

pixoo.py - This is a Python3 script for sending a custom image to a Divoom Pixoo Max. You may need to install additional libraries for Bluetooth and image manipulation support. USAGE: pixoo.py -u (URL to square image) This will download the image and encode/send it to the Pixoo Max. If the script is run with no argument, it will put the Pixoo Max into some kind of "demo mode" where it just cycles through animations. Based entirely on the pixoo-client library from virtualabs: https://github.com/virtualabs/pixoo-client/
