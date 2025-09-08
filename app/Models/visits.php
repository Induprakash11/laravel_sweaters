<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    protected $table = 'visits';
    
    protected $fillable = [
        'date',
        'ip_address',
        'first_visit',
        'last_visit',
        'visit_count',
        'country',
        'region',
        'city',
        'user_agent',
        'status',
        'form_submitted'
    ];
    
    public $timestamps = false;
}