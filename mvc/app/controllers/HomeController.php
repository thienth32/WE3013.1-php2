<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Employee;

class HomeController extends BaseController{

    public function index(){
        $emps = Employee::all();
        $this->render('home.index', ['employees' => $emps]);
    }
}

?>