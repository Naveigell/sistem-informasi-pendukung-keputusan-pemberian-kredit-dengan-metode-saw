<?php
use System\Router\Route;

$router = new Route();
$router->get('/', \App\Controllers\DashboardController::class, 'index');

$router->get('/login', \App\Controllers\LoginController::class, 'login');
$router->get('/logout', \App\Controllers\LoginController::class, 'logout');
$router->post('/login', \App\Controllers\LoginController::class, 'doLogin');

$router->get('/nasabah', \App\Controllers\NasabahController::class, 'index');
$router->get('/nasabah/insert', \App\Controllers\NasabahController::class, 'insert');
$router->get('/nasabah/bobot', \App\Controllers\NasabahController::class, 'bobot');
$router->get('/nasabah/edit', \App\Controllers\NasabahController::class, 'edit');
$router->post('/nasabah/bobot', \App\Controllers\NasabahController::class, 'updateBobot');
$router->post('/nasabah/create', \App\Controllers\NasabahController::class, 'create');
$router->post('/nasabah/update', \App\Controllers\NasabahController::class, 'update');
$router->post('/nasabah/delete', \App\Controllers\NasabahController::class, 'delete');

$router->get('/perhitungan', \App\Controllers\PerhitunganController::class, 'index');

//$router->get('/ranking/pdf', \App\Controllers\RankingController::class, 'generatePDF');
$router->get('/ranking', \App\Controllers\RankingController::class, 'ranking');

$router->get('/laporan', \App\Controllers\LaporanController::class, 'laporan');
$router->get('/laporan/pdf', \App\Controllers\LaporanController::class, 'generatePDF');

$router->get('/criteria', \App\Controllers\CriteriaController::class, 'index');
$router->get('/criteria/sub-criteria', \App\Controllers\CriteriaController::class, 'createSubCriteria');
$router->get('/criteria/edit', \App\Controllers\CriteriaController::class, 'edit');
$router->get('/criteria/insert', \App\Controllers\CriteriaController::class, 'insert');
$router->post('/criteria/create', \App\Controllers\CriteriaController::class, 'create');
$router->post('/criteria/update', \App\Controllers\CriteriaController::class, 'update');
$router->post('/criteria/delete', \App\Controllers\CriteriaController::class, 'delete');
$router->post('/criteria/update-sub-criteria', \App\Controllers\CriteriaController::class, 'updateSubCriteria');
$router->run();
