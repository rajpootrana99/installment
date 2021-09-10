<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_master_id',
        'vehicle_no',
        'qty',
        'gate_pass_no',
    ];

    public function goodsMaster(){
        return $this->belongsTo(GoodsMaster::class);
    }
}
