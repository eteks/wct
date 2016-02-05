<?php
define("DB_SERVER","localhost");
define("DB_SERVER_USERNAME",'root');
define("DB_SERVER_PASSWORD",'');
define("DB_DATABASE",'welocity');
$con =  mysql_connect(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD)or die("fail to connect".mysql_error());
mysql_select_db(DB_DATABASE,$con) or die(mysql_error("Database is not Connected"));
?>
