<?php
require __DIR__ . '/vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

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