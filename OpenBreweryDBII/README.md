# OpenBreweryDB II
[x] Points: 10
[x] Solves: 0

## Description
```
Let's keep playing with openbrewerydb API, but this time let's use the Python Wrapper!
https://jrbourbeau.github.io/openbrewerydb-python/api.html
https://www.openbrewerydb.org/
If you're using python2 (you probably are) I suggest installing the API via PIP with the following command:
pip install git+https://github.com/wbowditch/openbrewerydb-python.git
You'll have trouble answering this question by using cURL or a web browser.
How many distinct cities in Connecticut have a brewery listed in openbrewerydb?

Flag Format: fresher{<number of cities>}


```

## Solution
```
pip install git+https://github.com/wbowditch/openbrewerydb-python.git
```

```python
>>> import openbrewerydb
>>> openbrewerydb.load(state='connecticut').city.unique().size
71
```
##Flag
fresher{71}
