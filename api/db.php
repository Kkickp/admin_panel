<?php

$host = "gateway01.ap-northeast-1.prod.aws.tidbcloud.com";
$user = "2YwRN5U9FGjWBPP.root";
$pass = "bHhYbhEX4G1IpYKn";
$db   = "test";
$port = 4000;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
