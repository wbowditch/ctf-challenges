# Log Analysis Pr0
[x] Points: 30
[x] Solves: 10

## Description
```
The flag is somewhere in this large log file.

Find it!!!
```

## Solution
When you unsip the file you will find a log file with over a million random flags.
The trick to solving this was to realise that the format of the flags was similar to this flag: enusec{computer-computer-enusec}
however our flag format was not using dashes but instead using underscores.
A simple `grep _ console.log` will have returned the flag.
You could also use notepad to open the log file, then do ctrl+f (find) and search for an underscore.

## Flag
```enusec{l0G_anAly51S_15_fUn}```
