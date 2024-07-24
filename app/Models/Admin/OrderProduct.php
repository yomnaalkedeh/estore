<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    protected $table = "order_products";
}
