<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_states');
    }
}
