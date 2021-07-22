<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';
    public function galleries(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}

?>