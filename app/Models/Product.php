<?php

namespace App\Models;

use App\Models\Admin\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable=['name','desc', 'category_id','price','images'];
    // protected $casts = [
    //     'images' => 'array', // Ensure it is cast to array when retrieved
    // ];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_products');
    }
}
