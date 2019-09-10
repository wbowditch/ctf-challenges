<?php
$key = "6d4r4ru*54676349gHG^&rt756r49**y78";
$total = 50000;
$flag = "LTDH19{N3v3r_tRusT_tH3_T0k3n5}";

function writeToken($amount){
	global $key;
	$sign = md5("youcan'tbreakme" . $key . $amount);
	$cookie_body = "youcan'tbreakme." . $amount . "." . $sign;
	//print($cookie_body);
	setcookie("token", base64_encode($cookie_body));
}


function verifyToken($token){
	global $key;
	$ver = explode(".", base64_decode($_COOKIE["token"]));
	//print_r($ver);
	if(md5($ver[0] . $key . $ver[1]) === $ver[2]){
		//print("<br>Cookie is verified");
		$total = $ver[0];
		return intval($ver[1]);
	}
	else{
		//print("Cannot verify cookie");
		return 0;
	}

}


//writeToken("test");
?>
