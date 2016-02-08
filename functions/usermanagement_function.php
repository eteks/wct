<?php
require_once 'dbconnect.php';
// session_start();
 	class usermanagementFunction {		  
		function __construct() {			
			// connecting to database
			// $db = new dbConnect();
			// echo $db;			 
		}
		// destructor
		function __destruct() {
			
		}
		public function Login($emailid, $password){
			$res = mysql_query("SELECT * FROM wc_usermanagement WHERE usermanagement_username = '".$emailid."' AND usermanagement_password = '".$password."'");
			$user_data = mysql_fetch_array($res);
			$no_rows = mysql_num_rows($res);
			if ($no_rows == 1) 
			{		 
				$_SESSION['login'] = true;
				$_SESSION['uid'] = $user_data['id'];
				// $_SESSION['username'] = $user_data['usermanagement_username'];
				$_SESSION['email'] = $user_data['usermanagement_username'];
				if ($user_data['usermanagement_type'] == "administrator"){
					$_SESSION['admin'] = 1;
				}
				return TRUE;
			}
			else
			{
				return FALSE;
			}
			 
				 
		}
		public function isUserExist($emailid){
			$qr = mysql_query("SELECT * FROM users WHERE usermanagement_username = '".$emailid."'");
			echo $row = mysql_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}

	}
?>