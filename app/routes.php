<?php

/** @var \Silex\Application $app */

use Checkfood\Application\Controller;
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function () {
    return new Response('Working!!', Response::HTTP_OK);
});

$app->mount('/category', function (\Silex\ControllerCollection $category) {
    $category->get('/', Controller\Category\ListCategoryAction::class);
    $category->get('/{id}', Controller\Category\ListCategoryAction::class)
        ->assert('id', '\d+');
    $category->post('/create', Controller\Category\CreateCategoryAction::class);
});
