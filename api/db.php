<?php

$host = "gateway01.ap-northeast-1.prod.aws.tidbcloud.com";
$user = "2YwRN5U9FGjWBPP.root";
$pass = "bHhYbhEX4G1IpYKn";
$db   = "test";
$port = 4000;

$mysqli = mysqli_init();

/* Wajib SSL */
mysqli_ssl_set(
    $mysqli,
    NULL,
    NULL,
    __DIR__ . "/../certs/ca.pem",
    NULL,
    NULL
);

mysqli_real_connect(
    $mysqli,
    $host,
    $user,
    $pass,
    $db,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
);

if (mysqli_connect_errno()) {
    die("SSL DB connection failed: " . mysqli_connect_error());
}

$mysqli->set_charset("utf8mb4");

$conn = $mysqli;
?>