<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_master_id',
        'user_id',
        'broker_id',
        'goods_id',
        'bilty_no',
        'shipment_date',
        'delivery_date',
        'invoice_type',
    ];

    public function purchaseMaster(){
        return $this->belongsTo(PurchaseMaster::class);
    }

    public function goodsDetails(){
        return $this->hasMany(GoodsDetail::class);
    }
}
