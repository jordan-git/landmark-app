<?php

require __DIR__ . '/../../vendor/autoload.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

// $path = 'path/to/your/image.jpg1'

function detect_landmark($path)
{
    $imageAnnotator = new ImageAnnotatorClient();

    # annotate the image
    $image = file_get_contents($path);
    $response = $imageAnnotator->landmarkDetection($image);
    $landmarks = $response->getLandmarkAnnotations();

    printf('%d landmark found:' . PHP_EOL, count($landmarks));
    foreach ($landmarks as $landmark) {
        print($landmark->getDescription() . PHP_EOL);
    }

    $imageAnnotator->close();
}

detect_landmark(__DIR__ . '/../images/spire.jpg');
