<?php
namespace App\Controllers;
use Jenssegers\Blade\Blade;

class BaseController{

    protected function render($viewFile, $data = []){
        $blade = new Blade('./app/views', 'storage');
        echo $blade->make($viewFile, $data)->render();
    }
}


?>