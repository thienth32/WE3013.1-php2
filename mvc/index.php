<?php
require_once './vendor/autoload.php';
require_once './config/database.php';

use App\Controllers\HomeController;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch($url){
    case "/":
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    default:
        echo "Đường dẫn không tồn tại";
        break;
}
?>