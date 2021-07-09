<?php
// This file handles the database configuration for the fundme project.
// Please stick to mysqli throughout the database operation

// Connection variables
$host = "localhost";
$user = "root";
$password = "";
$database = "fundme";

// DB connection execution script
$db = new mysqli($host, $user, $password, $database);

// Checks if the connection was not successful
if($db->connect_error)
{
	// die("Database Connection Error, Error No.: ".$db->connect_errno." | ".$db->connect_error);
    echo "<h1>Database connection error!</h1>";
}

?>