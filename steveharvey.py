import uberduck
import subprocess
import sys

client = uberduck.UberDuck(UBERDUCK_API_KEY, UBERDUCK_API_SECRET)
inputfile = open("C:/Users/example/tts.txt", "r")
speech = inputfile.read()
inputfile.close()

try:
    client.speak(speech, "steveharvey", play_sound = True, file_path = "C:/Users/rjack/OneDrive/Projects/lordtaco/Sound Effects/SteveHarvey/latest.wav")
except uberduck.UberduckException:
    p = subprocess.Popen(["powershell.exe", 
              "C:\\Users\\example\\tts.ps1"], 
              stdout=sys.stdout)
    p.communicate()
