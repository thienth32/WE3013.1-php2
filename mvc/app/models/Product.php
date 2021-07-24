<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';

    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function category(){
        return $this->belongsTo(category::class, 'cate_id');
    }

    public function colors(){
        return $this->belongsToMany(Color::class, 'product_quantities', 'product_id', 'color_id');
    }

    public function pQuantites(){
        return $this->hasMany(ProductQuantity::class, 'product_id');
    }
}

?>