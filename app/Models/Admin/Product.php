<?php

namespace App\Models\Admin;

use App\Models\Rate;
use App\Models\Image;
use App\Models\Option;
use App\Models\Review;
use App\Models\Admin\Order;
use App\Models\OptionValue;
use App\Models\Admin\Category;
use App\Models\Admin\Location;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    protected $fillable=['name','desc','image', 'category_id','price'];
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
{
    $this
        ->addMediaConversion('preview')
        ->fit(Manipulations::FIT_CROP, 300, 300)
        ->nonQueued();
}
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_products');
    }
    public function favoritable()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
    public function locationable()
    {
        return $this->morphMany(Location::class, 'locationable');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class,'option_product');
    }

    public function option_values()
    {
        return $this->belongsToMany(OptionValue::class,'option_value_product');
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
