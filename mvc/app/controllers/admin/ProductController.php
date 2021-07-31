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

    public function editForm($id){
        $model = Product::find($id);
        if(!$model){
            header('location: ' . BASE_URL . 'admin/product');
            die;
        }

        $model->load('category', 'galleries');

        $cates = Category::all();

        $this->render('admin.product.edit-form', ['model' => $model, 'cates' => $cates]);

    }

    public function saveEdit($id){
        $model = Product::find($id);
        $model->fill($_POST);
        $model->save();
        // xóa những ảnh đc đánh dấu là xóa
        if($_POST['removeGalleryId'] != ""){
            $removeStr = ltrim($_POST['removeGalleryId'], '|');
            $idArr = explode("|", $removeStr);
            ProductGallery::destroy($idArr); 
        }

        // thêm ảnh mới vào
        $listFile = $_FILES['galleries'];
        $listTmp = $listFile['tmp_name'];
        $listImgName = $listFile['name'];
        if($listFile != null && count($listImgName) > 0){
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