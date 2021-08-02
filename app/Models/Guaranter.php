<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guaranter extends Model
{
    protected $fillable = [
        'name',
        'father_name',
        'material_status',
        'phone',
        'cnic',
        'monthly_income',
        'residential_address',
        'office_address',
        'occupation',
        'designation',
        'work_since',
        'image',
        'cnic_front',
        'cnic_back',
    ];

    public function getMaterialStatusAttribute($attribute){
        return $this->materialStatusOptions()[$attribute] ?? 0;
    }

    public function materialStatusOptions(){
        return [
            0 => 'Single',
            1 => 'Married',
        ];
    }

    use HasFactory;
}
