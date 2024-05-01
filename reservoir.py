import urllib.request
import json
import ssl

url = 'https://data.wra.gov.tw/Service/OpenData.aspx?format=json&id=50C8256D-30C5-4B8D-9B84-2E14D5C6DF71'
context = ssl._create_unverified_context()

with urllib.request.urlopen(url, context=context) as jsondata:
    data = json.loads(jsondata.read().decode('utf-8-sig'))

if 'DailyOperationalStatisticsOfReservoirs_OPENDATA' in data:
    data = data['DailyOperationalStatisticsOfReservoirs_OPENDATA']
    for d in data:
        print("{}:{}".format(d['ReservoirName'], d['Inflow']))
else:
    print("未找到數據")
