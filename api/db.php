<?php
$conn = new mysqli(
  "HOST_TIDB",
  "USER_TIDB",
  "PASS_TIDB",
  "DB_TIDB",
  4000
);

if ($conn->connect_error) {
  die("DB Error: " . $conn->connect_error);
}
?>
