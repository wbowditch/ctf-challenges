# Forensics Word Cloud
[x] Points: 10
[x] Solves: 0

## Description
```
I'm almost positive we put a flag in this file. Can you find it for me?

Flag format: enusec{...}

Hint: So many editors out there!
```

## Solution

```
strings wordcloud.jpg | grep enusec
enusec{forensicsezpz}
```

