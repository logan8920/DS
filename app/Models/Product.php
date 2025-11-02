<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    protected $primaryKey = 'product_id';
    public static $sellingPrice;

    public function file()
    {
        return $this->hasOne(ProductImage::class, "product_id", "product_id")
            ->where(function ($q) {
                $q->where('is_primary', 1);
                $q->orWhere("is_primary", 0);
            })
            ->where("is_active", 1);
    }

    public function files()
    {
        return $this->hasMany(ProductImage::class, "product_id", "product_id")
            ->where("is_active", 1)
            ->orderBy("is_active", "desc");
    }

    public function category()
    {
        return $this->hasOne(Category::class, "category_id", "category_id")
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

    public function productOptions()
    {
        return $this->hasMany(ProductAttributeValue::class, "product_id", "product_id");
           // ->selectRaw('attribute_id, product_attribute_id, value, product_id');
    }

    public function optionValues(){
        return $this->hasMany(ProductAttributeValue::class, "product_id", "product_id");

    }

    public function variants(){
        $driver = DB::connection()->getDriverName();

        if ($driver === 'mysql') {
            $filename = DB::raw("SUBSTRING_INDEX(image_path, '/', -1) as filename");
        } else { // PostgreSQL
            $filename = DB::raw("split_part(image_path, '/', array_length(string_to_array(image_path, '/'), 1)) as filename");
        }
        $this->variants = $this->optionValues()->select('attributes.name as optionName', 'value as name')->leftJoin('attributes', 'attributes.attribute_id', '=', 'product_attribute_values.attribute_id')->get()->toArray();

        $this->variants = array_map(function($val) use ( $filename){
            $return = [
                "optionValues" => [
                    $val
                ],
                 "file" => $this->file()
                    ->select([
                        "product_id",
                        DB::raw("CONCAT('" . asset('storage') . "/', image_path) as \"originalSource\""),
                        "alt_text as alt",
                        $filename,
                        DB::raw("'IMAGE' as \"contentType\"")
                    ])
                    ->first()->toArray(),
                "price" => self::$sellingPrice

            ];

            return $return;
                
        },$this->variants);

        if(!count($this->variants ?? [])) {
            $this->variants = [
                [
                    "optionValues" => [
                        [
                            "optionName" => "DefaultOption",
                            "name" => "DefaultValue"
                        ]
                    ],
                    "file" => $this->file()
                        ->select([
                            "product_id",
                            DB::raw("CONCAT('" . asset('storage') . "/', image_path) as \"originalSource\""),
                            "alt_text as alt",
                            $filename,
                            DB::raw("'IMAGE' as \"contentType\"")
                        ])
                        ->first()->toArray(),
                    "price" => self::$sellingPrice
                ]
            ];
        }
        return $this;
    }

    protected $hidden = [
        'product_id',
    ];

}
