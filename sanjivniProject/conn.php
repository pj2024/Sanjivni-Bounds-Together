<?php
    // Now you can process the data as needed (e.g., save to a database, send an email, etc.)
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sanjivni";

// Example: Save to a database (You need to set up your database connection)
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>