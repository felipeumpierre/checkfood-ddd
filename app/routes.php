<?php

/** @var \Silex\Application $app */

use Checkfood\Application\Controller;

$app->post('/category/create', Controller\CreateCategoryAction::class);