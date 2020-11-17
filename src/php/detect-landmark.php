<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../php/db-connection.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;


function detect_landmark($path)
{
    $imageAnnotator = new ImageAnnotatorClient();
    $conn = openConnection();

    $image = file_get_contents($path);
    $response = $imageAnnotator->landmarkDetection($image);
    $landmarks = $response->getLandmarkAnnotations();

    $imageAnnotator->close();

    // $landmarks = ['Spire of Dublin', 'Statue'];

    foreach ($landmarks as $landmark) {
        $name = $landmark->getDescription();

        // $name = $landmark;

        $sql = 'SELECT * FROM landmarks WHERE landmark_name = ?';

        $query = $conn->prepare($sql);
        $query->bind_param("s", $name);
        $query->execute();

        $result = $query->get_result();
        if ($result->num_rows === 0) continue;

        closeConnection($conn);
        return $result->fetch_row();
    }

    closeConnection($conn);
    return false;
}
