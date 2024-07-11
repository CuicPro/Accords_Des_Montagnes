<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adm";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
// $conn = new mysqli($servername, $username, $password, $dbname);


?>