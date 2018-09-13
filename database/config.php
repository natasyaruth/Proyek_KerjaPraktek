<?php
// Connect to MySQL
/*$host = "localhost";
$dbname = "data";
$username = "root";
$password = "";*/

$host = "10.251.38.231";
$dbname = "DATA";
$username = "apps";
$password = "ApPs#2014";

$link = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('Asia/Jakarta');
?>