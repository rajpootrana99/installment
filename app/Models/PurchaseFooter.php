<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseFooter extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_master_id',
        'gross_value',
        'discount_1_total',
        'discount_2_total',
        'tax_total',
        'other_expenses',
        'extra_discount',
        'net_value',
        'remarks',
    ];

    public function purchaseMaster(){
        return $this->belongsTo(PurchaseMaster::class);
    }
}
