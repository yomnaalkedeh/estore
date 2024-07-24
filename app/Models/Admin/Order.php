<?php

namespace App\Models\Admin;


use App\Models\User;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id'];
    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products');

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
