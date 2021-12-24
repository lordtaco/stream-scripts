import os
import time
from wyze_sdk import Client
from wyze_sdk.errors import WyzeApiError

os.environ['WYZE_EMAIL'] = 'xxxxxxxxxxxxxxxxxx'
os.environ['WYZE_PASSWORD'] = 'xxxxxxxxxxxxx'

client = Client(email=os.environ['WYZE_EMAIL'], password=os.environ['WYZE_PASSWORD'])

try:
  plug = client.plugs.info(device_mac='AAAAAAAAAAAA')
  client.plugs.turn_off(device_mac=plug.mac, device_model=plug.product.model)
  time.sleep(1)
  client.plugs.turn_on(device_mac=plug.mac, device_model=plug.product.model)

except WyzeApiError as e:
    print(f"Got an error: {e}")
