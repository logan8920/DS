<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceAProduct extends Model
{
    protected $fillables = [
        "user_id",
        'product_name',
        'category_id',
        "expected_price",
        "expected_daily_order",
        'image',
        'link',
        'created_at',
        'updated_at'
    ];
}
