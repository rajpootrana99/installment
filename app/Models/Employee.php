<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        'caste',
        'cnic_expiry',
        'dob',
        'work_since',
        'residential_phone',
        'residential_since',
        'image',
        'cnic_front',
        'cnic_back',
        'document',
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
            0 => 'Sales Officer',
            1 => 'Marketing Officer',
            2 => 'Inquiry Officer',
            3 => 'Recovery Officer',
        ];
    }
}
