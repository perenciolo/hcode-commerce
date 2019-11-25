<?php

use \Slim\Slim;
use \Perenciolo\Page;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Slim();

$app->config('debug', true);

$app->get('/', function(){
  $page = new Page();
  $page->setTpl("index");
});

$app->run();