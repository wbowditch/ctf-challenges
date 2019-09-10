#!/bin/sh
useradd -ms /bin/bash  fresher01
echo 'fresher01:enusec' | chpasswd
echo "fresher{bread_n_butter}" > /home/fresher01/flag
chmod 0750 /home/fresher01

useradd -ms /bin/bash  fresher02
mkdir /home/fresher02/directory
echo 'fresher02:fresher{bread_n_butter}' | chpasswd
echo "fresher{test2}" > /home/fresher02/directory/.flag
chmod 0750 /home/fresher02
/usr/sbin/sshd -D