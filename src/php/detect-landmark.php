<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../php/db-connection.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;


function detect_landmark($path)
{
    // Create image reader and connect to database
    $imageAnnotator = new ImageAnnotatorClient();
    $conn = openConnection();

    // Read image, submit to API and read landmark data response
    $image = file_get_contents($path);
    $response = $imageAnnotator->landmarkDetection($image);
    $landmarks = $response->getLandmarkAnnotations();

    // Close image reader connection
    $imageAnnotator->close();

    // $landmarks = ['Spire of Dublin', 'Statue'];

    foreach ($landmarks as $landmark) {
        $name = $landmark->getDescription();

        // $name = $landmark;

        $sql = 'SELECT * FROM landmarks WHERE landmark_name = ?';

        // Prepare query
        $query = $conn->prepare($sql);

        // Add variable to query in the position of '?'
        $query->bind_param("s", $name);
        $query->execute();

        $result = $query->get_result();
        if ($result->num_rows === 0) continue;

        $conn->close();
        return $result->fetch_row();
    }

    $conn->close();
    return false;
}
