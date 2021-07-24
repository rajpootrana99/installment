<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_id',
        'sub_head_id',
        'account_detail_name',
        'account_nature',
        'account_code',
        'serial_number',
    ];

    public function getAccountNatureAttribute($attribute){
        return $this->accountNatureOptions()[$attribute] ?? 0;
    }

    public function accountNatureOptions(){
        return [
            9 => 'Is Vendor Header',
            8 => 'Is Bank Account',
            7 => 'Is Sales Account',
            6 => 'Is COGS Account',
            5 => 'Is Employe',
            4 => 'Is Customer Header',
            3 => 'Is Cash Account',
            2 => 'Is Inventory Account',
            1 => 'Is Process Account',
            0 => 'Other',
        ];
    }

    public function head(){
        return $this->belongsTo(Head::class);
    }

    public function subHead(){
        return $this->belongsTo(SubHead::class);
    }
}
