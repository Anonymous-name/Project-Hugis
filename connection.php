<?php
$servername = "338690";
$username = "338690";
$password = "Obito1311";
$host = "localhost";

try {
  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password, $localhost);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>