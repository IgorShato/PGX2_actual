<?php 

$host = 'localhost';
$db_name = '';
$server_login = '';
$server_password = '';
$charset = 'utf8';

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=$charset", $server_login, $server_password);