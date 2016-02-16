<?php
    require_once 'dbconnect.php';
 	class usermanagementFunction {
		function __construct() {
			// connecting to database
			// $db = new dbConnect();
			// echo $db;
		}
		// destructor
		function __destruct() {

		}
		public function Login($emailid, $password,$usertype){
			$res = mysql_query("SELECT * FROM wc_usermanagement WHERE usermanagement_username ='$emailid' and usermanagement_password ='$password' and usermanagement_type = '$usertype'");
			$user_data = mysql_fetch_array($res);
			$no_rows = mysql_num_rows($res);
			if ($no_rows == 1){
                session_start();
                $_SESSION['login'] = true;
				$_SESSION['userid'] = $user_data['usermanagement_id'];
                $_SESSION['usertype'] = $user_data['usermanagement_type'];
				$_SESSION['email'] = $user_data['usermanagement_username'];
				return TRUE;
			}
			else{
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
    if(isset($_POST)){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['userid'] = '100';
        $_SESSION['usertype'] = 'admin';
    }
?>
