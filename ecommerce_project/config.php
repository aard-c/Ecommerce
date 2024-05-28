<?php
session_start(); // Start the session

// Display PHP errors
ini_set('display_errors', '1'); // 1 is on, 0 is off
ini_set('display_startup_errors', '1'); // 1 is on, 0 is off
error_reporting(E_ALL);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query function
function berkhoca_query_parser($sql = '') {
    global $conn; // Use the global $conn variable

    if (empty($sql)) {
        return 'SQL statement is empty';
    }

    $query_result = $conn->query($sql);
    if ($query_result === false) {
        return "Error: " . $conn->error;
    }

    $array_result = [];
    while ($row = $query_result->fetch_assoc()) {
        $array_result[] = $row;
    }

    return $array_result;
}
?>
