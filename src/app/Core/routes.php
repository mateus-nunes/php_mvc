<?php

use App\Controllers\AppController;
use App\Controllers\UserController;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/router.php';

// ##################################################
// Rotas elaboradas utilizando a biblioteca PHPRouter - https://phprouter.com/
// ##################################################

get('/', function () {
  $controller = new AppController();
  $controller->index();
});

get('/users', function () {
  $controller = new UserController();
  $controller->list();
});

get('/users/create', function () {
  $controller = new UserController();
  $controller->create();
});

post('/users/create', function () {
  $controller = new UserController();
  $controller->insert();
});

get('/users/$id/update', function ($id) {
  $controller = new UserController();
  $controller->edit($id);
});

post('/users/$id/update', function ($id) {
  $controller = new UserController();
  $controller->update($id);
});

get('/users/$id/delete', function ($id) {
  $controller = new UserController();
  $controller->confirmDelete($id);
});

post('/users/$id/delete', function ($id) {
  $controller = new UserController();
  $controller->delete($id);
});

get('/users/$id', function ($id) {
  $controller = new UserController();
  $controller->view($id);
});

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', 'views/404.php');
