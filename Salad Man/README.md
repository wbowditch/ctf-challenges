# Salad Man
[x] Points: 20
[x] Solves: 0

## Description
```
A man dressed as a Roman military general bumps into you, dropping the note he had in his pocket. 
Before you get a chance to say something, he's dissapeared. You pick up the note but it looks like gibberish:

gur synt vf serfure{rgghoehgr}

flag format = fresher{...}
```
```python
## Solution
def caesar(plaintext, shift):
	import string
	alphabet = string.ascii_lowercase
	shifted_alphabet = alphabet[shift:] + alphabet[:shift]
	table = string.maketrans(alphabet, shifted_alphabet)
	return plaintext.translate(table)
>>> for i in range(26):
...     print caesar("gur synt vf serfure{rgghoehgr}",i)
...
gur synt vf serfure{rgghoehgr}
hvs tzou wg tfsgvsf{shhipfihs}
iwt uapv xh ugthwtg{tiijqgjit}
jxu vbqw yi vhuixuh{ujjkrhkju}
kyv wcrx zj wivjyvi{vkklsilkv}
lzw xdsy ak xjwkzwj{wllmtjmlw}
max yetz bl ykxlaxk{xmmnuknmx}
nby zfua cm zlymbyl{ynnovlony}
ocz agvb dn amznczm{zoopwmpoz}
pda bhwc eo bnaodan{appqxnqpa}
qeb cixd fp cobpebo{bqqryorqb}
rfc djye gq dpcqfcp{crrszpsrc}
sgd ekzf hr eqdrgdq{dsstaqtsd}
the flag is fresher{ettubrute}  <-- this is the flag
uif gmbh jt gsftifs{fuuvcsvuf}
vjg hnci ku htgujgt{gvvwdtwvg}
wkh iodj lv iuhvkhu{hwwxeuxwh}
xli jpek mw jviwliv{ixxyfvyxi}
ymj kqfl nx kwjxmjw{jyyzgwzyj}
znk lrgm oy lxkynkx{kzzahxazk}
aol mshn pz mylzoly{laabiybal}
bpm ntio qa nzmapmz{mbbcjzcbm}
cqn oujp rb oanbqna{nccdkadcn}
dro pvkq sc pbocrob{oddelbedo}
esp qwlr td qcpdspc{peefmcfep}
ftq rxms ue rdqetqd{qffgndgfq}
```