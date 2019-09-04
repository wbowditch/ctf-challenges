# Lets get musical
[x] Points: 30
[x] Solves: 3

## Description
```
We recovered a file of a terrorists computer.

We need you to find out what it is saying.

flag format = enusec{...}
```

## Solution
This challenge seemed to throw a lot of people off and only had a small number of solves.
A quick inspection of the file given to us (by opening it in a text editor) shows us
that the contents seem to be encoded in some way. When it appears that something is encoded the immedaite thought should be `base64`. In this challenge we can
check this in multiple different ways.

### Check the very end of the file
This gives us `qqqqqqqqqqqqqqqqqg==` and because of the double equals we can
almost say for certain that it is base64.

### The filename
The filename of the file also seems to be encoded. Now we have a very short string which
we can attempt to decode. If you try multiple decoding strategies and then try base64
you will see that the filename when base64 decoded is: `fin.mp3`.

Now we know that the file is base64 encoded.

The simplest way to decode a file is
`base64 -d filename`
This then shows the user the result. However we know that we want a file. Therefore
you can use the command `base64 -d filename > temp.mp3` to redirect the output into another file.

This can also be done manually by using online tools to decode the contents of the file
and then using notepad to create a new file and paste the decoded contents into it.

At this point we have an mp3 file. If the compeitior does not know that it is an mp3 file
they can use the command `file temporaryfile` to view the type of file based from its file signature.

Now the competitor just has to listen to the mp3.

This gives:
```
The lower case flag is base64_is_awesome_in leet speek.
```

Unfortunately I made a couple of errors with this flag.
 * The first was an underscore after awesome (Which is an obvious error and the competitor should've been able to work that out)
 * The second is my version of leet speak is not leet enough and "a" was not replaced by 4

However regardless the final flag when you change it into my version of leet speak: 
ba5364_15_aw350m3

## Flag
```enusec{ba5364_15_aw350m3}```
