<?php

namespace App\Models\Admin;

use App\Models\Admin\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable =['payment_method'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
