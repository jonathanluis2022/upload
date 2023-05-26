<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "upload";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno)
die("erro ao conectar o banco de dados ");