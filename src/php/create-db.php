<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "password";

// Create a connection to MySQL
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Load queries in create-db.sql
$queries = file_get_contents(__DIR__ . "/../sql/create-db.sql");

// Execute queries
$conn->multi_query($queries);

// Close MySQL connection
$conn->close();
