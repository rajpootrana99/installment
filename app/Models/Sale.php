<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'item_id',
        'guaranter_id',
        'site_id',
        'sales_officer_id',
        'marketing_officer_id',
        'inquiry_officer_id',
        'recovery_officer_id',
        'process_id',
        'process_type',
        'process_fee',
        'registration_fee',
        'remarks',
        'total_purchase',
        'total_sales',
        'no_of_installment',
        'down_payment',
        'total_balance',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function salesOfficer(){
        return $this->belongsTo(Employee::class, 'sales_officer_id', 'id');
    }

    public function marketingOfficer(){
        return $this->belongsTo(Employee::class, 'marketing_officer_id', 'id');
    }

    public function inquiryOfficer(){
        return $this->belongsTo(Employee::class, 'inquiry_officer_id', 'id');
    }

    public function recoveryOfficer(){
        return $this->belongsTo(Employee::class, 'recovery_officer_id', 'id');
    }

    public function site(){
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }
}
