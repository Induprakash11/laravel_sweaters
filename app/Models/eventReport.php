<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReport extends Model
{
    use HasFactory;

    protected $table = 'event_report';
    
    protected $fillable = [
        'date',
        'image',
        'title',
        'description',
        'status',
    ];
    
    public $timestamps = false;
}