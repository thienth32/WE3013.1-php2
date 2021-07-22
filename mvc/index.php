<?php
require_once './vendor/autoload.php';
require_once './config/database.php';
require_once './config/common.php';

use App\Controllers\HomeController;
use App\Controllers\Admin\DashboardController;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch($url){
    case "/":
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    case "fake-data":
        $ctr = new HomeController();
        echo $ctr->fakeData();
        break;
    case 'admin':
        $ctr = new DashboardController();
        echo $ctr->index();
    default:
        echo "Đường dẫn không tồn tại";
        break;
}
?>