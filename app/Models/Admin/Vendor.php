<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable =['user_id'];
    public function userable()
    {
        return $this->morphMany(User::class, 'userable');
    }
 /*   public function products()
    {
        return $this->hasMany(Product::class);
    }*/
}
