<?php

/** @var \Silex\Application $app */

use Checkfood\Application\Controller;
use Symfony\Component\HttpFoundation\Response;

$app->get('/', function () {
    return new Response('All good!', Response::HTTP_OK);
});

$app->mount('/category', function (\Silex\ControllerCollection $category) {
    $category->get('/{id}', Controller\Category\ListCategoryAction::class)
        ->assert('id', '\d+');
    $category->post('/create', Controller\Category\CreateCategoryAction::class);
});
