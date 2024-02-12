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
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$number1 = $_POST['number1'];
$message =$_POST['message'];

// Insert form data into database
$query = "INSERT INTO form (name,email,password,number1,message) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "sssss", $name,$email,$password,$number1,$message);

if (mysqli_stmt_execute($stmt)) {
    echo "Details Enter successfully!";
} else {
    echo "Details Not Entered: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>