<?php
include_once("../config.php");
$create_table = "CREATE TABLE `users` (`id` int(11) NOT NULL,`name` varchar(255) NOT NULL);";
$dummy_entry = "INSERT INTO `users` (`id`, `name`) VALUES (1, 'test1'),(2, 'test2');";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE ".$dbname;
if ($conn->query($sql) === TRUE) {
    echo "1. Database created successfully<br>";
    $conn->select_db($dbname);
} else {
    echo "Error creating database: " . $conn->error;
}

// Create table
if ($conn->query($create_table) === TRUE) {
    echo "2. Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert dummy data
if ($conn->query($dummy_entry) === TRUE) {
    echo "3. Data inserted successfully<br>";
} else {
    echo "Error in database: " . $conn->error;
}

$conn->close();

?>