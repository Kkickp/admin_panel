<?php

$host = "gateway01.ap-northeast-1.prod.aws.tidbcloud.com";
$user = "2YwRN5U9FGjWBPP.root";
$pass = "bHhYbhEX4G1IpYKn";
$db   = "blangkis_admin";
$port = 4000;

$ssl_ca = __DIR__ . "/../certs/ca.pem";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);
$conn->real_connect($host, $user, $pass, $db, $port);

$conn->set_charset("utf8mb4");
