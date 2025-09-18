<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    public function label() {
        return $this->hasOne(Attribute::class, "attribute_id","attribute_id");
    }

    public function values()  {
        return $this->hasMany(Self::class, "attribute_id", "attribute_id")->where("product_id",$this->product_id);
    }
}
