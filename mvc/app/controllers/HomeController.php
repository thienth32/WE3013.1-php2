<?php
namespace App\Controllers;
use App\Models\User;

class HomeController extends BaseController{

    public function index(){
        $data = User::$data;
        $this->render('home.index', ['data' => $data]);
    }
}

?>