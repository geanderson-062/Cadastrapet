<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cadastrapet";

$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);