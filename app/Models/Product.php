<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    public function image()
    {
        return $this->hasOne(ProductImage::class, "product_id", "product_id")
            ->where(function($q) {
                $q->where('is_primary', 1);
                $q->orWhere("is_primary", 0);
            })
            ->where("is_active",1);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, "product_id", "product_id")
            ->where("is_active",1)
            ->orderBy("is_active","desc");
    }

    public function category()  {
        return $this->hasOne(Category::class, "category_id","category_id")
        ->whereIsActive(1);
    }

    public function previous()
    {
        return self::where('product_id', '<', $this->product_id)
            ->orderBy('product_id', 'desc')
            ->first();
    }

    public function next()
    {
        return self::where('product_id', '>', $this->product_id)
            ->orderBy('product_id', 'asc')
            ->first();
    }

    public function attributes() {
        return $this->hasMany(ProductAttributeValue::class, "product_id","product_id")->groupBy("attribute_id");
    }
}
