<?php
// Set up database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "wizard";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$tracking_number = $_POST['tracking_number'];

// Insert form data into database
$query = "INSERT INTO login (tracking_number) VALUES (?)";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $tracking_number);

if (mysqli_stmt_execute($stmt)) {
    echo "Trace successfully!";
} else {
    echo "Trace Failed: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>