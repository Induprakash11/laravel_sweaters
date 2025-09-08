<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingUser extends Model
{
    use HasFactory;

    protected $table = 'landing_users';
    
    protected $fillable = [
        'date',
        'name',
        'mobile',
        'message',
        'status',
    ];
    
    public $timestamps = false;
}