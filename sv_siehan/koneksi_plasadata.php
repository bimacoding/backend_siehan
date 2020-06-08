<?php
ini_set('memory_limit', '256M');
define("DATABASE_HOST", "localhost"); 
define("DATABASE_NAME", "db_bigdata"); 
define("DATABASE_USER", "root"); 
define("DATABASE_PASSWORD", ""); 
// define("DATABASE_HOST", "localhost"); 
// define("DATABASE_NAME", "plasa_data"); 
// define("DATABASE_USER", "root"); 
// define("DATABASE_PASSWORD", "");
$con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME) or die("<p>Connection Failed! Check Your Connection Config:<br />" .mysqli_error(). "</p>");


function strqu($text){
	$string = $text;
	$replacements = array(
	    "," => "&comma;",
	    "(" => "&lpar;",
	    ")" => "&rpar;",
	    "\""=> "&quot",
	    "'" => "&apos;",
	);
	$string = strtr($string, $replacements);

	return $string;
}

?>