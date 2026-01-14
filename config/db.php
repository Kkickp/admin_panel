<?php
$conn = new mysqli("localhost","root","","blangkis_admin");
if($conn->connect_error) die("DB Error");
session_start();
?>