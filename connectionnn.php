<?php
$servername = "50.62.209.113:3306";
$username = "balu211221";
$password = "211221@dbpwdBALU";
$dbname = "db1234balram";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
?>