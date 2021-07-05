<?php
use System\Router\Route;

$router = new Route();
//$router->get('/', \App\Controllers\LoginController::class, 'login');
$router->get('/', \App\Controllers\DashboardController::class, 'index');
$router->post('/login', \App\Controllers\LoginController::class, 'doLogin');

$router->get('/nasabah', \App\Controllers\NasabahController::class, 'index');
$router->get('/nasabah/insert', \App\Controllers\NasabahController::class, 'insert');
$router->get('/nasabah/bobot', \App\Controllers\NasabahController::class, 'bobot');
$router->post('/nasabah/bobot', \App\Controllers\NasabahController::class, 'updateBobot');
$router->post('/nasabah/create', \App\Controllers\NasabahController::class, 'create');

$router->get('/perhitungan', \App\Controllers\PerhitunganController::class, 'index');

$router->get('/criteria', \App\Controllers\CriteriaController::class, 'index');
$router->get('/criteria/edit', \App\Controllers\CriteriaController::class, 'edit');
$router->get('/criteria/insert', \App\Controllers\CriteriaController::class, 'insert');
$router->post('/criteria/create', \App\Controllers\CriteriaController::class, 'create');
$router->post('/criteria/update', \App\Controllers\CriteriaController::class, 'update');
$router->post('/criteria/update-sub-criteria', \App\Controllers\CriteriaController::class, 'updateSubCriteria');
$router->run();
