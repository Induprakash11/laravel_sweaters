<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyVisit extends Model
{
    use HasFactory;

    protected $table = 'daily_visits';
    
    protected $fillable = [
        'ip_address',
        'visit_date'
    ];
    
    public $timestamps = false;
}