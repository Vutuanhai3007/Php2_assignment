<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product  extends Model{
    protected $table = "products";
    protected $fillable = [
        'name','category_id', 'main_image', 'price', 'detail', 'promotion'
    ];
    public $timestamps = false;
}
?>