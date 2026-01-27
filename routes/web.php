<?php

use App\Controllers\HomeController;

$router->get('home', [HomeController::class, 'index']);
$router->get('about', [HomeController::class, 'about']);



// First comment

// Second comment


