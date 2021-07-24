<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Product;

class ProductController extends BaseController{

    public function index(){
        $products = Product::all();
        // var_dump($products);die;
        $this->render('admin.product.index', ['products' => $products]);
    }
}
?>