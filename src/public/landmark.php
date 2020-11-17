<?php
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../php/detect-landmark.php';

// Import Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

if (($_FILES['pic']['name'] != "")) {
    $file = $_FILES['pic']['name'];
    $path = pathinfo($file);

    $target_dir = __DIR__ . '/../images/';
    $unique_name = md5($path['filename'] . time());
    $ext = $path['extension'];

    $temp_name = $_FILES['pic']['tmp_name'];
    $path_filename_ext = $target_dir . $unique_name . "." . $ext;

    move_uploaded_file($temp_name, $path_filename_ext);

    $landmark = detect_landmark($path_filename_ext);

    unlink($path_filename_ext);

    if (!$landmark) {
        echo $twig->render('404.twig'); // TODO: replace with landmark not identified page
        return;
    }

    echo $twig->render('landmark.twig', ['name' => $landmark[1], 'lat' => $landmark[2], 'lng' => $landmark[3]]);
}
