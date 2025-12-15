<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function orderItem(){
        return $this->hasOne(OrderItem::class,'order_id','order_id');
    }

    public function paymentDetails() {
        return $this->hasOne(OrderPaymentDetails::class,'order_id','order_id');
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'customer' => 'json',
            'shopify_response' => 'json',
            'line_items' => 'json',
            'billing_address' => 'json',
            'shipping_address' => 'json'
        ];
    }


}
