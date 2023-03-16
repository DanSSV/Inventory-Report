<?php
$mysqli = new mysqli("localhost", "root", "", "samantha");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$current_time = time();

$time_limit = strtotime('-6 months', $current_time);

$sql = "UPDATE product SET status = 'Discontinued' WHERE last_updated < '$time_limit'";

if (!$mysqli->query($sql)) {
    echo "Error updating data: " . $mysqli->error;
}

$mysqli->close();
?>

<!-- <form method="post" action="lastupdate.php">
  <button type="submit" name="update_data" class="btn btn-primary">Update Data</button>
</form> -->
