<?php
use Phroute\Phroute\RouteCollector;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\ProductController;
use App\Controllers\HomeController;
$router = new RouteCollector();


$router->filter('auth', function(){    
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])) 
    {
        header('Location: ' . BASE_URL . 'login');
        return false;
    }
});


$url = isset($_GET['url']) ? $_GET['url'] : "/";

$router->get('/', [HomeController::class, 'index']);

$router->get('login', [HomeController::class, 'login']);
$router->post('login', [HomeController::class, 'postLogin']);
$router->any('logout', [HomeController::class, 'logout']);

$router->group(['before' => 'auth'], function($router){
    $router->get('admin', [DashboardController::class, 'index']);
    $router->get('admin/category', [CategoryController::class, 'index']);
    $router->get('admin/product', [ProductController::class, 'index']);
    $router->get('admin/product/add', [ProductController::class, 'addForm']);
    $router->post('admin/product/add', [ProductController::class, 'saveAdd']);

    $router->get('admin/product/edit/{id}', [ProductController::class, 'editForm']);
    $router->post('admin/product/edit/{id}', [ProductController::class, 'saveEdit']);

});


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
    
// Print out the value returned from the dispatched function
echo $response;

?>