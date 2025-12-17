<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    public function subCatProduct()
    {
        $subCatIds = $this->children()->get()->pluck('category_id')->toArray();

        return Product::whereIn('category_id',$subCatIds);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
