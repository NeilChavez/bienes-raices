<?php
require_once __DIR__ . "/../includes/app.php";

use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\PropertyController;
use Controllers\SellerController;
use MVC\Router;

$router = new Router();

//Private Urls
$router->get('/admin', [PropertyController::class, "index"]);

$router->get('/properties/create', [PropertyController::class, "create"]);
$router->post('/properties/create', [PropertyController::class, "create"]);
$router->get('/properties/update', [PropertyController::class, "update"]);
$router->post('/properties/update', [PropertyController::class, "update"]);
$router->post('/properties/delete', [PropertyController::class, "delete"]);

$router->get('/sellers/create', [SellerController::class, "create"]);
$router->post('/sellers/create', [SellerController::class, "create"]);
$router->get('/sellers/update', [SellerController::class, "update"]);
$router->post('/sellers/update', [SellerController::class, "update"]);
$router->post('/sellers/delete', [SellerController::class, "delete"]);

//Public Urls
$router->get('/', [PagesController::class, 'index']);
$router->get('/about-us', [PagesController::class, 'aboutUs']);
$router->get('/properties', [PagesController::class, 'properties']);
$router->get('/property', [PagesController::class, 'property']);
$router->get('/blog', [PagesController::class, 'blog']);
$router->get('/post', [PagesController::class, 'post']);
$router->get('/contact', [PagesController::class, 'contact']);
$router->post('/contact', [PagesController::class, 'contact']);
 
// Login
$router->get( '/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);


$router->checkRoutes();
