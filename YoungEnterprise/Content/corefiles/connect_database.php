<?php
/*$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$mysql_database = 'users';*/

$mysql_host = "mysql14.000webhost.com";
$mysql_database = "a5890181_users";
$mysql_user = "a5890181_meister";
$mysql_password = "Pot80s";

if(!@mysql_connect($mysql_host,$mysql_user,$mysql_password)|| !@mysql_select_db($mysql_database)){
die('Could not connect');
}




?>