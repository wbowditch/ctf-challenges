# OpenBreweryDB I
[x] Points: 10
[x] Solves: 0

## Description
```
Last week I stumbled upon a free API for public information on breweries, cideries, brewpubs, and bottleshops in the US.
https://www.openbrewerydb.org/
It even has information on my favorite 'regional' brewery in Boston! Can you find the year that this brewery was founded?

Flag Format: fresher{<year brewery was founded>}


```

## Solution
'''
(base) bill:FreshersCTF20 williambowditch$ curl https://api.openbrewerydb.org/breweries\?by_city=boston\&by_type=regional | python -m json.tool
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100   362    0   362    0     0    738      0 --:--:-- --:--:-- --:--:--   738
[
    {
        "brewery_type": "regional",
        "city": "Boston",
        "country": "United States",
        "id": 3287,
        "latitude": "42.3465637",
        "longitude": "-71.0348293",
        "name": "Harpoon Brewery",
        "phone": "6175749551",
        "postal_code": "02210-2367",
        "state": "Massachusetts",
        "street": "306 Northern Ave Ste 2",
        "tag_list": [],
        "updated_at": "2018-08-24T00:41:22.031Z",
        "website_url": "http://www.harpoonbrewery.com"
    }
]
'''
Navaigate to harpoonbrewery.com to find https://www.harpoonbrewery.com/who-we-are/history/, which will give you the founding year 1986.


##Flag
fresher{1986}
