<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;

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
        
        $model = new Product();
        $model->fill($_POST);
        
        $model->save(); // $model->id

        $listFile = $_FILES['galleries'];
        $listTmp = $listFile['tmp_name'];
        $listImgName = $listFile['name'];
        if(count($listImgName) > 0){
            for($i = 0; $i < count($listTmp); $i++){
                $filename = uniqid() . '-' . $listImgName[$i];
                move_uploaded_file($listTmp[$i], './public/uploads/product/' .$filename);
                $galleryModel = new ProductGallery();
                $galleryModel->product_id = $model->id;
                $galleryModel->img_url = "uploads/product/" . $filename;
                $galleryModel->save();
            }
        }
        header('location: ' . BASE_URL . 'admin/product');
        
    }
}
?>