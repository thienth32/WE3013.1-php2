<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class CategoryController extends BaseController{

    public function index(){
        $this->render('admin.category.index');
    }
}
?>