<?php
include("flag.php");
$hash1 = rand(1111111111111111, 9999999999999999);
$hash2 = rand(1111111111111111, 9999999999999999);
$input = parse_str(parse_url("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", PHP_URL_QUERY));
if(isset($input['_'])){
	$_ = $input['_'];
}
if(!isset($hash)){
	$hash = hash('md5', $FLAG, false);
}
if(strpos(str_replace(array('e','n', 't', 'e', 'r'), '',$_), "enter") !== false){
	if (!preg_match('/[abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $hash1)){
        	if((int)($hash1.$hash2) == ($hash2 - hash('md5', $hash, false))){
			echo($FLAG);
		}
	}
}
highlight_file(__FILE__);
?>
