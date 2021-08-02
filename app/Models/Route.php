<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const http\Client\Curl\Versions\ARES;

class Route extends Model
{
    protected $fillable = [
        'name',
    ];
    use HasFactory;

    public function areas(){
        return $this->belongsToMany(Area::class);
    }
}
