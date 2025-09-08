<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialReport extends Model
{
    use HasFactory;

    protected $table = 'testimonial_report';
    
    protected $fillable = [
        'date',
        'image',
        'name',
        'message',
        'rating',
        'status',
    ];
    
    public $timestamps = false;
}