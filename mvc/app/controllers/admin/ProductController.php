<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;

class ProductController extends BaseController{

    public function index(){
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : "";
        $products = Product::where('name', 'like', "%$keyword%")->get();
        // var_dump($products);die;
        $this->render('admin.product.index', ['products' => $products, 'keyword' => $keyword]);
    }

    public function addForm(){
        $cates = Category::all();
        $this->render('admin.product.add-form', ['cates' => $cates]);
    }

    // hoàn thành việc lưu dữ liệu từ form để tạo mới sp + gallery
    public function saveAdd(){
        $listFile = $_FILES['galleries'];
        $listTmp = $listFile['tmp_name'];
        $listImgName = $listFile['name'];
        for($i = 0; $i < count($listTmp); $i++){
            $filename = uniqid() . '-' . $listImgName[$i];
            move_uploaded_file($listTmp[$i], './public/uploads/product/' .$filename);
            echo PUBLIC_PATH . "uploads/product/" . $filename;
            echo "<br>";
        }
    }
}
?>