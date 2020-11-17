<?php
// Create a connection to the landmarks-app database and return it
function openConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "password";
    $db = "landmark-app";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

// Close the landmarks-app MySQL connection
function closeConnection($conn)
{
    $conn->close();
}
