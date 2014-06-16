<?php
/*
$dbhost = 'localhost';
$dbuser = 'anonymous';
$dbpass = 'horizon';
*/

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'test';

//$connMySQL = mysql_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
$connMySQL = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

//$dbname = 'test';
$connDB = mysql_select_db($dbname);

?>