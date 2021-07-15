<?php
namespace App\Controllers;
use App\Models\User;

class HomeController extends BaseController{

    public function index(){
        // $data = User::$data;
        $data = "<strong>thẻ bôi đậm</strong>";
        $gender = 3;
        $this->render('home.index', ['data' => $data, 'gender' => $gender]);
    }
}

?>