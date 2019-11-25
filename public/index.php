<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function(){
  $sql = new Perenciolo\DB\Sql();

  $results = $sql->select("SELECT * FROM tb_users");

  echo json_encode($results);
});

$app->run();