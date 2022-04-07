$tts = Get-Content "C:\Users\example\tts.txt" 
$tts = $tts -replace "\\", ""

Add-Type -AssemblyName System.speech
$speak = New-Object System.Speech.Synthesis.SpeechSynthesizer

#$speak.SelectVoice('Microsoft Zira Desktop')
$speak.SelectVoice('Microsoft David Desktop')

$speak.Speak($tts)
$speak.Dispose()
