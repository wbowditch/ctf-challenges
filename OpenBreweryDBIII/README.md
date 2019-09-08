# OpenBreweryDB III
[x] Points: 10
[x] Solves: 0

## Description
```
Which city has the fifth highest number of breweries in California?

Flag Format: fresher{<name of city>}


```

## Solution
'''
pip install git+https://github.com/wbowditch/openbrewerydb-python.git
'''

'''python
>>> import openbrewerydb
>>> openbrewerydb.load(state='california').city.value_counts().index[4].encode('utf-8')
'Anaheim'
'''
##Flag
fresher{Anaheim}