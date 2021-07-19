<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected $fillable = [
        'name',
        'serial_code',
    ];
    use HasFactory;

    public function subHeads(){
        return $this->hasMany(SubHead::class);
    }

    public function accountDetails(){
        return $this->hasMany(AccountDetail::class);
    }
}
