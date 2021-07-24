<?php
use Phroute\Phroute\RouteCollector;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\ProductController;
use App\Controllers\HomeController;
$router = new RouteCollector();


$url = isset($_GET['url']) ? $_GET['url'] : "/";


$router->get('/', [HomeController::class, 'index']);
$router->get('admin', [DashboardController::class, 'index']);
$router->get('admin/category', [CategoryController::class, 'index']);
$router->get('admin/product', [ProductController::class, 'index']);



# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
    
// Print out the value returned from the dispatched function
echo $response;

?>