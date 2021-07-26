<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'year_string',
        'status',
    ];

    public function getStatusAttribute($attribute){
        return $this->statusOptions()[$attribute] ?? 0;
    }

    public function statusOptions(){
        return [
            0 => 'Open',
            1 => 'Active',
        ];
    }
}
