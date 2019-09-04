# le chiffre indéchiffrable
[x] Points: 30
[x] Solves: 0

## Description
```
The roman cos-player has returned, but this time with a French friend named Giovan Battista Bellaso. The roman whispers one word to you before throwing a napkin in your face and hopping in a cab - "veni". 

You are uncomfortable.

The napkin is covered in childish drawings and gibberish:

d pihi, d fir, q jemnlrz{pbtovvkfiqgv}

flag format = fresher{...}


```
```python
## Solution
def caesar(plaintext, code):
	plaintext = plaintext.lower()
	code = code.lower()
	import string
	alphabet = string.ascii_lowercase
	answer = []
	for i in range(len(plaintext)):
		if plaintext[i] in alphabet:
			x = ord(code[i % len(code)]) - 97
			y = ord(plaintext[i]) - 97
			z = (y - x) % 26
			ch = chr(z + 97)
			answer.append(ch)
		else:
			answer.append(plaintext[i])
	return "".join(answer)




print caesar("d pihi, d fir, q jemnlrz{pbtovvkfiqgv}", "veni")
i came, i saw, i fresher{loltrickedya}
```