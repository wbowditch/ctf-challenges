<?php
$DBUSER = 'root';
$DBPASS = 'fr3sherctf2019';

system('mysql -u '.$DBUSER.' -p'.$DBPASS.' < sqlitraining_ctf.sql');
echo "DB reset!<br/>";
echo "Go back to <a href='/'>Home</a>";
?>
