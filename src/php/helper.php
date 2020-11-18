<?php

require __DIR__ . '/../../vendor/autoload.php';

// Create a connection to the landmarks-app database and return it
function open_connection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "password";
    $db = "landmark-app";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}


function detect_landmark($path)
{
    // Create image reader and connect to database
    // $imageAnnotator = new  Google\Cloud\Vision\V1\ImageAnnotatorClient();
    $conn = open_connection();

    // Read image, submit to API and read landmark data response
    // $image = file_get_contents($path);
    // $response = $imageAnnotator->landmarkDetection($image);
    // $landmarks = $response->getLandmarkAnnotations();

    // Close image reader connection
    // $imageAnnotator->close();

    $landmarks = ['Spire of Dublin', 'Statue'];

    foreach ($landmarks as $landmark) {
        // $name = $landmark->getDescription();

        $name = $landmark;

        $sql = 'SELECT * FROM landmarks WHERE landmark_name = ?';

        // Prepare query
        $query = $conn->prepare($sql);

        // Add variable to query in the position of '?'
        $query->bind_param("s", $name);
        $query->execute();

        $result = $query->get_result();
        if ($result->num_rows === 0) {
            continue;
        }

        $conn->close();
        return $result->fetch_row();
    }

    $conn->close();
    return false;
}

// Read information from the .env file and return as key/value pairs
function read_env()
{
    $env_array = [];
    $file = fopen(__DIR__ . '/../../.env', 'r');

    if ($file) {
        while(($line = fgets($file)) !== false) {
            $split_line = explode('=', $line);
            $env_array[$split_line[0]] = $split_line[1];
        }

        fclose($file);
    }

    return $env_array;
}

// Set up Twig in preparation to load templates
function setup_twig()
{
    $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');

    // Remove auto reload after development to enable cache
    $twig = new Twig\Environment($loader, ['cache' => __DIR__ . '/../cache', 'auto_reload' => true]);

    return $twig;
}
