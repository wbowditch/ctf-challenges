<?php
// Create connection
$DBUSER = 'root';
$DBPASS = 'fr3sherctf2019';

$con=mysqli_connect("127.0.0.1",$DBUSER,$DBPASS,"bankdb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "<font style=\"color:#FF0000\">Could not connect:". mysqli_connect_error()."</font\>";
  }
?>
