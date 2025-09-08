<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    
    protected $fillable = [
        'date',
        'category',
        'brand',
        'gauge',
        'construction',
        'fabric',
        'moq',
        'image',
        'status',
    ];
    
    public $timestamps = false;
}