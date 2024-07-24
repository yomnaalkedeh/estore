<?php

namespace App\Models;

use App\Enums\PagesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'type'];
    protected $casts = [
        'type' => PagesEnum::class
    ];
}
