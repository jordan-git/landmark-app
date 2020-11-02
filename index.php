<?php
require __DIR__ . '/vendor/autoload.php';

// Import Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// Reroute to specific Twig page depending on requested route
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
    switch ($request_uri) {
        case '' :
        case '/' :
            echo $twig->render('index.twig');
            break;
        case '/about':
            echo $twig->render('about.twig');
            break;
    }
} else if ($request_method === 'POST') {
    switch ($request_uri) {
        case '/upload' :
            // Add upload code here
            break;
    }
}
