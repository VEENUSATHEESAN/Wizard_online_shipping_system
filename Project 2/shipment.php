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
$sender_name = $_POST['sender_name'];
$sender_address = $_POST['sender_address'];
$recipient_name = $_POST['recipient_name'];
$recipient_address = $_POST['recipient_address'];
$Frome = $_POST['Frome'];
$Too = $_POST['Too'];
$package_weight = $_POST['package_weight'];
$package_width = $_POST['package_width'];
$package_height = $_POST['package_height'];
$package_length = $_POST['package_length'];

// Insert form data into database
$query = "INSERT INTO shipmentdetail (sender_name, sender_address, recipient_name, recipient_address, Frome, Too, package_weight, package_width, package_height, package_length) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ssssssdddd", $sender_name, $sender_address, $recipient_name, $recipient_address, $Frome, $Too, $package_weight, $package_width, $package_height, $package_length);

if (mysqli_stmt_execute($stmt)) {
    echo "New shipment created successfully!";
} else {
    echo "Error creating shipment: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>