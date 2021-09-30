<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'type',
        'marital_status',
        'cell',
        'cnic',
        'monthly_income',
        'residential_address',
        'office_address',
        'caste',
        'cnic_expiry',
        'dob',
        'occupation',
        'designation',
        'work_since',
        'residential_phone',
        'residential_since',
        'office_phone',
        'image',
        'cnic_front',
        'cnic_back',
    ];

    public function getMaritalStatusAttribute($attribute){
        return $this->maritalStatusOptions()[$attribute] ?? 0;
    }

    public function maritalStatusOptions(){
        return [
            0 => 'Single',
            1 => 'Married',
        ];
    }

    public function getTypeAttribute($attribute){
        return $this->typeOptions()[$attribute] ?? 0;
    }

    public function typeOptions(){
        return [
            0 => 'Cash',
            1 => 'Credit',
            2 => 'Installment'
        ];
    }

    public function saleMasters(){
        return $this->hasMany(SaleMaster::class);
    }
}
