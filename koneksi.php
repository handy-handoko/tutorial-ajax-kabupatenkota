<?php 
$host = 'localhost';
$dbName = 'kabupatenkota';
$username = 'root';
$password = 'secretPassword';

$dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password);
