<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'material_status',
        'cell',
        'cnic',
        'residential_address',
        'office_address',
        'residential_phone',
        'residential_since',
        'office_phone',
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
}
