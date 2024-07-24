<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SubCategory extends Pivot
{
    protected $table = "sub_categories";
}
