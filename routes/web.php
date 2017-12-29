<?php

use App\Controllers\SiteController;

$app->get('/mug-club', SiteController::class . ':mugClub')->setName('mug-club');
$app->get('/mug-club/info', SiteController::class . ':mugClubInfo')->setName('mug-club-info');
$app->get('/[{message}]', SiteController::class . ':home')->setName('home');
// $app->get('/about', SiteController::class . ':about')->setName('about');
// $app->get('/beers', SiteController::class . ':beers')->setName('beers');
// $app->get('/swag', SiteController::class . ':swag')->setName('swag');
// $app->get('/news', SiteController::class . ':news')->setName('news');
// $app->get('/contact', SiteController::class . ':contact')->setName('contact');
$app->post('/contact', SiteController::class . ':post')->setName('contact');
