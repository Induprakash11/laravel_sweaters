<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaUrl extends Model
{
    use HasFactory;

    protected $table = 'socialmedia_url';
    
    protected $fillable = [
        'date',
        'facebook',
        'instagram',
        'twitter',
        'status',
    ];
    
    public $timestamps = false;
}