<?php

namespace App\Models;

use App\Models\OptionValue;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function optionValues()
    {
        return $this->hasMany(OptionValue::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'option_product');
    }
}
