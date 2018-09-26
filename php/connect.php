<?php
session_start();
$servername = "localhost";
$username = "zarvil_smart_hub";
$password = "Bofik_smart2018";
$db = "zarvil_smart_hub";

try {
     $conn = new mysqli($servername, $username, $password, $db);
    //  echo "Connected successfully";
}catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}

?>