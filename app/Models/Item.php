<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'manufacturer_id',
        'item_code',
        'name',
        'image',
        'description',
        'remarks',
        'cost_price',
        'purchase_price',
        'company_price',
        'is_sale_price_defined',
        'sale_price_1',
        'sale_price_2',
        'sale_price_3',
        'sale_price_4',
        'sale_price_5',
    ];

    public function getIsSalePriceDefinedAttribute($attribute){
        return $this->isSalePriceDefinedOptions()[$attribute] ?? 0;
    }

    public function isSalePriceDefinedOptions(){
        return [
            0 => 'Purchase Price',
            1 => 'Company Price',
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function barcodes(){
        return $this->hasMany(Barcode::class);
    }
}
