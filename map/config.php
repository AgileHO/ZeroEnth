<?php

$dbhost = 'localhost';
$dbuser = 'anonymous';
$dbpass = 'horizon';

$connMySQL = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
$connDB = mysql_select_db($dbname);

?>