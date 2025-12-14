<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    public function seller() {
        return $this->hasOne(SellerProfile::class,'user_id','seller_id');
    }
}
