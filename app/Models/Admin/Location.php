<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['address','city','country','user_id', 'locationable_type', 'locationable_id'];
    public function locationable()
    {
        return $this->morphTo('locationable');
    }
}
