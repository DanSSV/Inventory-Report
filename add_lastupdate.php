<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sale";

$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$current_date = date("Y-m-d H:i:s");
$sql = "UPDATE product SET last_update='$current_date'";
if (!$mysqli->query($sql)) {
    echo "Error updating record: " . $mysqli->error;
}

$mysqli->close();
?>