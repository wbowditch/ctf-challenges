# Ping Of Death
[x] Points: 50
[x] Solves: 9

## Description
```
Someone just found out they can use ping and send data to servers.

Can you find out what they are saying?
```

## Solution
This challenge has two solutions. The correct solution is to open the log.pcapng in
wireshark. This shows you a list of ICMP requests. If the user scrolls through these
ICMP requests/responses they should see that some contain messages in the request body. The messages that are most interested are
ones containing ```partofflag```. By scrolling through the packets and jotting down
the request data of the packets which contain ```partofflag``` the competitior can
begin to get sections of the flag.

For example if the user extracts all the messages that contain something to do with the flag
thye will get the follwoing list:
```
partofflag:enusepartofflag:enusepartoffl
partofflag:enusepartofflag:enusepartoffl
partoffflag:{Youpartoffflag:{Youpartofff
partoffflag:{Youpartoffflag:{Youpartofff
partoffflag:_canpartoffflag:_canpartofff
partoffflag:_canpartoffflag:_canpartofff
partoffflag:_senpartoffflag:_senpartofff
partoffflag:_senpartoffflag:_senpartofff
partoffflag:d_mepartoffflag:d_mepartofff
partoffflag:d_mepartoffflag:d_mepartofff
partoffflag:ssagpartoffflag:ssagpartofff
partoffflag:ssagpartoffflag:ssagpartofff
partoffflag:es_wpartoffflag:es_wpartofff
partoffflag:es_wpartoffflag:es_wpartofff
partoffflag:ith_partoffflag:ith_partofff
partoffflag:ith_partoffflag:ith_partofff
partoffflag:_icmpartoffflag:_icmpartofff
partoffflag:_icmpartoffflag:_icmpartofff
finalbitflag:p}0finalbitflag:p}0finalbit
finalbitflag:p}0finalbitflag:p}0finalbit
```
From here it is up to the competitor to descramble the message and retrieve the flag.
This list can also be generated without opening the log file.
If the competitior ran the command:
`strings log.pcapng | grep flag`
They would get this message and from here be able to find the flag.

Descrambling the messages and removing duplicates gives the flag: enusec{You_can_send_messages_with_icmp}

`Using strings and grep to find flags in pcap files is very useful to save time when doing CTF's as devlopers seem to be unaware that the challenges can be solved like this.`
## Flag
```enusec{You_can_send_messages_with_icmp}```
