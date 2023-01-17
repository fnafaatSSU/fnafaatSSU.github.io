<?php
	define("db_server","localhost");
	define("dd_name","Sree");
	define("db_username","Sree");
	define("db_password",'ITE320');
	date_default_timezone_set("America/New_York");

	function db_connect() {
		
		$connection_string = "mysql:host=" . constant("db_server") . ";dbname=" . constant("dd_name");
		$db = new PDO($connection_string,constant("db_username"),constant("db_password"));
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
?>