<?php 

error_reporting(~E_DEPRECATED&~E_NOTICE);

define ('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define ('DBNAME', 'cr11_adam_petadoption');

$connect = new  mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
}else {

}

?>