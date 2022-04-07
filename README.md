# stream-scripts
Some scripts I've written for some interactive features on my Twitch streams.

colorchange.php - Whenever someone redeems or uses the !colorchange command, the name of the color is converted to RGB values via the array found in colors.php. If a valid color is found, the script then interfaces with the Govee public API and sends a command to change both sets of my LED light strips to the selected color.

customvoice.php - Script for storing/retrieving the custom voice for a user when they redeem text to speech.

pixoo.py - This is a Python3 script for sending a custom image to a Divoom Pixoo Max. You may need to install additional libraries for Bluetooth and image manipulation support. USAGE: pixoo.py -u (URL to square image) This will download the image and encode/send it to the Pixoo Max. If the script is run with no argument, it will put the Pixoo Max into some kind of "demo mode" where it just cycles through animations. Based entirely on the pixoo-client library from virtualabs: https://github.com/virtualabs/pixoo-client/

random_game.php - This script selects a random number from a set number of records in a MySQL table, and marks them as inactive once selected. This way, each number is randomly selected only once per stream. That number is then passed to an event in Touch Portal, which then runs a Powershell script that loads a corresponding rom file with that name.

resetgameconsoles.py - Resets my console by turning off the Wyze smart plug for one second, then turning it back on.

tts-uberduck.py - Small Python script that uses the UberDuck wrapper to generate a custom voice for the text to speech commands. Falls back to a PowerShell script that runs the default MS voice if the UberDuck API fails.

tts.ps1 - Fallback script in case the Uberduck API is not working. Will generate a text to speech using the Microsoft speech engine built into Windows.
