<?php
function strqu($text){
	$string = $text;
	$replacements = array(
	    "--" => "/",
	    "-+-" => ":",
	);
	$string = strtr($string, $replacements);

	return $string;
}


echo strqu("Hallo -- saya -+- Arif tes");
