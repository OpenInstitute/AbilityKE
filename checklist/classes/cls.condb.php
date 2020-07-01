<?php
require_once('cls.base.php');

define('DB_HOST', 		'localhost');
define('DB_CHARSET', 	 'utf8');




if($_SERVER['HTTP_HOST'] == "localhost"){
	define('DB_NAME', 'local-db-bname');	
	define('DB_USER', 'local-db-user');
	define('DB_PASSWORD', 'local-db-pass');
} else {

	define('DB_NAME', 		'your-db-name');	
	define('DB_USER', 	 	'your-prod-db-user');
	define('DB_PASSWORD', 	'your-password');  
}


?>
