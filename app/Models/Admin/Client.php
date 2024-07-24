<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable =['user_id'];
    public function userable()
    {
        return $this->morphMany(User::class, 'userable');
    }
       public function favoritable()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
  /*  public function orders()
    {
        return $this->hasMany(Order::class);
    }*/
}
