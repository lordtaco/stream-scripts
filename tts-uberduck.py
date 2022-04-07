import uberduck
import subprocess
import sys

voice = sys.argv[1]

client = uberduck.UberDuck('xxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxx')

inputfile = open("C:/Users/example/tts.txt", "r")
speech = inputfile.read()
inputfile.close()

try:
    client.speak(speech, voice, play_sound = True, file_path = "C:/Users/example/latest.wav")
except uberduck.UberduckException:
    p = subprocess.Popen(["powershell.exe", 
              "C:\\Users\\example\\Scripts\\tts.ps1"], 
              stdout=sys.stdout)
    p.communicate()
