<?php
$servername = "127.0.0.1"; // or "localhost"
$username = "root";        // your database username
$password = "";            // your database password (leave empty if you don't have one)
$dbname = "mystore";       // your database name
$port = 4306;              // custom port number 4306

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // This runs if there's an error
} 
?>
