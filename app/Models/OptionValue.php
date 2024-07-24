<?php

namespace App\Models;

use App\Models\Option;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionValue extends Model
{
    use HasFactory;
    protected $fillable = ['value','option_id'];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'option_value_product');
    }
}
