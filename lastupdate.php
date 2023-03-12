$mysqli = new mysqli("localhost", "username", "password", "database_name");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Get the current date and time
$current_time = time();

$time_limit = strtotime('-6 months', $current_time);

$sql = "UPDATE your_table SET status = 2 WHERE last_updated < '$time_limit'";

if (!$mysqli->query($sql)) {
    echo "Error updating data: " . $mysqli->error;
}

$mysqli->close();