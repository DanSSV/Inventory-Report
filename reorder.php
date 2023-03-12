<?php
$servername = "127.0.0.1";
$username = "root";
$password = "apol09212001";
$dbname = "stocks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE product SET quantity = quantity + 10 WHERE quantity < 6";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success");
} else {
    $response = array("status" => "error");
}

echo json_encode($response);

$conn->close();
?>