<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Size;
use App\Models\ProductGallery;
use DateTime;

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

    public function login(){
        // echo password_hash('123456', PASSWORD_DEFAULT);
        // die;
        if(isset($_COOKIE['login_token']) && !empty($_COOKIE['login_token'])){
            $token = $_COOKIE['login_token'];
            $now = new DateTime();
            
            $user = User::where('remember_token', $token)
                        ->where('remember_expire', '>=', $now->format('Y-m-d H:i:s'))
                        ->first();
            if($user){
                $_SESSION['auth'] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'is_admin' => $user->is_admin,
                ];
                header('location: ' . BASE_URL . 'admin');die;
            }else{
                setcookie('login_token', '', time() - 1, '/');
            }
        }

        $this->render('auth.login');
    }

    public function logout(){
        unset($_SESSION['auth']);
        header('location: ' . BASE_URL);
        die;
    }

    public function postLogin(){
        
        ['email' => $email, 'password' => $password, 'remember' => $remember] = $_POST;
        $user = User::where('email', $email)->first();
        if(password_verify($password, $user->password)){

            $_SESSION['auth'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'is_admin' => $user->is_admin,
            ];
            if($remember){
                $token = sha1(uniqid() . $user['email']);
                $expire = new DateTime("+15 days");
                $user->remember_token = $token;
                $user->remember_expire = $expire->format('Y-m-d H:i:s');
                $user->save();

                setcookie('login_token', $token, time() + (60*60*24*15), '/');
            }else{
                $user->remember_token = '';
                $user->remember_expire = null;
                $user->save();
            }
            header('location: ' . BASE_URL . 'admin');
            die;
        }

        header('location: ' . BASE_URL . 'login?msg=Đăng nhập không thành công');
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