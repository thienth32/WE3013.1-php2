<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductGallery;

class HomeController extends BaseController{

    public function index(){
        $pagenumber  = isset($_GET['page']) ? $_GET['page'] : 1;
        $pagesize = 9;
        $offset = ($pagenumber-1)*$pagesize;
        $products = Product::orderByDesc('total_views')->skip($offset)->take($pagesize)->get();
        $cates = Category::orderByDesc('id')->take(8)->get();
        $toprateProducts = Product::orderByDesc('stars')->orderByDesc('total_views')->take(2)->get();
        $latestProducts = Product::orderByDesc('id')->take(3)->get();
        
        $this->render('home.index', compact('products', 'cates', 'toprateProducts', 'latestProducts'));
    }

    public function fakeData(){
        $faker = \Faker\Factory::create();
        // categories
        for($i = 0; $i < 10; $i++){
            $model = new Category();
            $model->name = $faker->name();
            $model->save();
        }

        // condition
        $conditionArr = [
            "New", "Like new", "Old", "Re-factory"
        ];
        foreach($conditionArr as $item){
            $model = new Condition();
            $model->name = $item;
            $model->save();
        }

        // size
        $sizeArr = ["XS", "S", "M", "L", "XL"];
        foreach($sizeArr as $item){
            $model = new Size();
            $model->name = $item;
            $model->save();
        }
        // products + product_galleries
        for($i = 0; $i < 100; $i++){
            $model = new Product();
            $model->cate_id = Category::all()->random()->id;
            $model->name = $faker->name();
            $model->condition_id = Condition::all()->random()->id;
            $model->price = rand(1, 5000);
            if(rand(0, 1) == 1){
                $model->sale_price = rand(1, $model->price-5);
            }
            $model->short_desc = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $model->quantity = rand(1, 500);
            $model->pro_desc = $faker->realText($maxNbChars = 500, $indexSize = 3);
            $model->specification = $faker->realText($maxNbChars = 500, $indexSize = 3);
            $model->stars = rand(1, 5);
            $model->total_views = rand(1, 3000);
            $model->save();
            $product_id = $model->id;
            echo "$product_id <br>";
            $randomImg = rand(2, 5);
            for($j = 0; $j < $randomImg; $j++){
                $proGalModel = new ProductGallery();
                $proGalModel->product_id = $model->id;
                $proGalModel->img_url = "uploads/product/" . rand(1, 7) . '.jpg';
                $proGalModel->save();
            }
        }

        echo "done";
        die;
    }
}

?>