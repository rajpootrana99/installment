<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'contact_name',
        'company_name',
        'address',
        'city',
        'cell',
        'cnic',
        'phone',
        'second_phone',
        'fax',
        'email',
        'web',
        'ntn',
        'credit_limit',
        'recovery_day',
        'image',
        'cnic_front',
        'cnic_back',
        'document',
    ];
}
