<?php
class dbConnect {
    public $DB_HOST='localhost';
    public $DB_USER='root';
    public $DB_PASSWORD='root';
    public $DB_DATABASE='wellocity';
    // public $DB_HOST='mysql509.ixwebhosting.com';
    // public $DB_USER='A978313_welocity';
    // public $DB_PASSWORD='A978313';
    // public $DB_DATABASE='A978313_welocity';
    function __construct() {
        $conn = mysql_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD);
        mysql_select_db($this->DB_DATABASE, $conn);
        if(!$conn){
            die ("Cannot connect to the database");
        }
        return $conn;
    }
    public function Close(){
        mysql_close();
    }
}
$db = new dbConnect();
?>
