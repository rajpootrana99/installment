<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'customer_id',
        'site_id',
        'user_id',
        'date',
    ];

    public function items(){
        return $this->belongsToMany(Item::class)->withPivot('tax_id', 'qty', 'rate', 'gross_total', 'discount', 'total')->withTimestamps();
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function saleFooter(){
        return $this->hasOne(SaleFooter::class);
    }
}
