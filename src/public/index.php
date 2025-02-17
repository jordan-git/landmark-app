<?php
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../php/helper.php';

// Set up Twig
$twig = setup_twig();

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
        default:
            echo $twig->render('home.twig', ['notFound' => true]);; // change to 404.twig
            break;
    }
}
