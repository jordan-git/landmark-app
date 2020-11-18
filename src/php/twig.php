<?php
require __DIR__ . '/../../vendor/autoload.php';

// Import Twig
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// Set up Twig
function setupTwig()
{
    $loader = new FilesystemLoader(__DIR__ . '/../templates');

    // Remove auto reload after development to enable cache
    $twig = new Environment($loader, ['cache' => __DIR__ . '/../cache', 'auto_reload' => true]);

    return $twig;
}
