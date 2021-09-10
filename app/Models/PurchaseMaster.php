<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'vendor_id',
        'date',
        'vendor_invoice_no',
    ];

    public function items(){
        return $this->belongsToMany(Item::class)->withPivot('tax_id', 'qty', 'rate', 'gross_total', 'discount_1', 'discount_2', 'total')->withTimestamps();
    }

    public function purchaseFooter(){
        return $this->hasOne(PurchaseFooter::class);
    }

    public function goodsMaster(){
        return $this->hasOne(GoodsMaster::class);
    }
}
