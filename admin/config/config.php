<?php
$mysqli = new mysqli("localhost","root","","webthethao");
// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối MySQLI lỗi: " .$mysqli->connect_error;
  exit();
}
?>