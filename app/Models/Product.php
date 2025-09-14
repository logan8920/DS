<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images() {
        return $this->hasMany(ProductImage::class, "product_id", "product_id");
    }

    public function variants()  {
        return $this->hasMany(Product::class, "product_id", "product_id");
    }

    public function productOptions()  {
        return $this->hasMany(ProductAttributeValue::class, "product_id", "product_id");
    }

    protected $hidden = ['product_id'];
}
