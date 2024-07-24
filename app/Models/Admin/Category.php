<?php

namespace App\Models\Admin;

use App\Models\Admin\State;
use App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable =['name'];
    public function subcategories()
    {
        return $this->belongsToMany(Category::class, 'sub_categories', 'category_id', 'subcategory_id');
    }
    public function states()
    {
        return $this->belongsToMany(State::class,'category_states');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
