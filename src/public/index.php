<?php
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../php/detect-landmark.php';

// Import Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

// Reroute to specific Twig page depending on requested route
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// if (in_array($request_uri, ['/index.php', '/.htaccess'])) echo $twig->render('home.twig');

if ($request_method === 'GET') {
    switch ($request_uri) {
        case '':
        case '/':
            echo $twig->render('home.twig');
            break;
        case '/about-us':
            echo $twig->render('about-us.twig');
            break;
        case '/faq':
            echo $twig->render('faq.twig');
            break;
        case '/detect':
            $landmark = detect_landmark(__DIR__ . '/../images/spire.jpg');

            if (!$landmark) {
                echo $twig->render('404.twig');
                return;
            }

            echo $twig->render('landmark.twig', ['name' => $landmark[1], 'lat' => $landmark[2], 'lng' => $landmark[3]]);
            break;
        default:
            echo $twig->render('404.twig');
            break;
    }
} else if ($request_method === 'POST') {
    switch ($request_uri) {
        case '/upload':
            // Add upload code here
            break;
    }
}
