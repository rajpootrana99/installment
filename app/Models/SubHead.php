<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHead extends Model
{
    use HasFactory;
    protected $fillable = [
        'head_id',
        'name',
        'serial_code',
    ];

    public function head(){
        return $this->belongsTo(Head::class);
    }

    public function accountDetails(){
        return $this->hasMany(AccountDetail::class);
    }
}
