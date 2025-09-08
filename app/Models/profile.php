<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    
    protected $fillable = [
        'date',
        'title',
        'mobile_number',
        'email',
        'address',
        'image',
        'home',
        'homevalue',
        'about',
        'aboutvalue',
        'product',
        'productvalue',
        'productnew',
        'productnew_value',
        'gallery',
        'gallery_value',
        'career',
        'career_value',
        'footer_title',
        'company_site',
        'status',
    ];
    
    public $timestamps = false;
}