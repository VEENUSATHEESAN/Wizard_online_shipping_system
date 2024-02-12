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
$username = $_POST['username'];
$password = $_POST['password'];

// Insert form data into database
$query = "INSERT INTO login (username,password) VALUES (?, ?)";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ss", $username,$password);

if (mysqli_stmt_execute($stmt)) {
    echo "Login successfully!";
} else {
    echo "Login Failed: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>