<?php
require __DIR__ . '/vendor/autoload.php';

// Import Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// Reroute to specific Twig page depending on requested route
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '' :
    case '/' :
        echo $twig->render('index.twig');
        break;
    case '/about':
        echo $twig->render('about.twig');
        break;
}