# Garfield
[x] Points: 10
[x] Solves: 0

## Description
```
Garfield hates Mondays, and he wants to know how many of the dates in this file are on Monday.

Flag format: fresher{<number of Mondays in dates.txt>}

Hint: It's not zero, and import datetime.
```

## Solution

```python
import datetime
count = 0
with open("garfield.txt") as f:
    for line in f:
        line = line.strip()
        print line
        try:
            day = datetime.datetime.strptime(line, '%B %d, %Y').strftime('%A')
            if day == "Monday":
                count+=1
        except:
            pass
print count


```

##Flag
fresher{195}
