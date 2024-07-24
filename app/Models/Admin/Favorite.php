<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'favoritable_type', 'favoritable_id'];
    public function favoritable()
    {
        return $this->morphTo('favoritable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
