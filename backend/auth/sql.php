<?php

$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'mybusiness';

$conn = mysqli_connect($host, $username, $pass, $db);

if (!$conn) {
    die('data error');
}
