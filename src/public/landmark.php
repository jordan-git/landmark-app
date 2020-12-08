<?php
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../php/helper.php';

// Set up Twig
$twig = setup_twig();

if (($_FILES['pic']['name'] != "")) {
    $file = $_FILES['pic']['name'];
    $path = pathinfo($file);

    $target_dir = __DIR__ . '/../images/';

    // Randomize file name once uploaded using timestamp
    $unique_name = md5($path['filename'] . time());
    $ext = $path['extension'];

    $temp_name = $_FILES['pic']['tmp_name'];

    // Uploaded image new name/path
    $path_filename_ext = $target_dir . $unique_name . "." . $ext;

    // Move to images folder
    move_uploaded_file($temp_name, $path_filename_ext);

    $landmark = detect_landmark($path_filename_ext);

    // Delete uploaded image
    unlink($path_filename_ext);

    if (!$landmark) {
        echo $twig->render('home.twig', ['notFound' => $landmark[1]]);
        return;
    }

    // Read file related to landmark in data folder and separate new lines into array
    $desc = explode("\n", file_get_contents(__DIR__ . '/../data/' . $landmark[4]));
    $link_lines = explode("\n", file_get_contents(__DIR__ . '/../data/' . $landmark[5]));
    $links = array();

    foreach ($link_lines as $line) {
        $split_line = explode("|", $line);
        array_push($links, array($split_line[0], $split_line[1]));
    }

    $maps_api_key = read_env()['MAPS_API_KEY'];

    echo $twig->render('landmark.twig', ['name' => $landmark[1], 'lat' => $landmark[2], 'lng' => $landmark[3], 'desc' => $desc, 'mapsKey' => $maps_api_key, 'links' => $links, 'audio' => $landmark[6], 'img' => $landmark[7]]);
}
