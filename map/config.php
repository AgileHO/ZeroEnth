<?php

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = '';

$connMySQL = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
$connDB = mysql_select_db($dbname);

?>