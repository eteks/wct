<?php
require_once 'dbConnect.php';
session_start();
 	class dbFunction {		  
		function __construct() {			
			// connecting to database
			$db = new dbConnect();
			echo $db;			 
		}
		// destructor
		function __destruct() {
			
		}
	}
?>