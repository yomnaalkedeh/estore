<?php

namespace App\Models;

use App\Models\Admin\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable=['name','desc', 'category_id','price'];
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
