<?php 
$con_error = "Could not connect";

$mysql_host = "localhost";
$mysql_name = "root";
$mysql_password = "";
$mysql_db = "forher";

if (!@mysql_connect($mysql_host, $mysql_name, $mysql_password) || !@mysql_select_db($mysql_db)) {
die ($con_error);
}
?>