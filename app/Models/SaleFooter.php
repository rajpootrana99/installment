<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleFooter extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_master_id',
        'gross_value',
        'discount_total',
        'tax_total',
        'extra_discount',
        'net_value',
        'remarks',
    ];

    public function saleMaster(){
        return $this->belongsTo(SaleMaster::class);
    }
}
