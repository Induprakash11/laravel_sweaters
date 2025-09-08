<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogReport extends Model
{
    use HasFactory;

    protected $table = 'blog_report';
    
    protected $fillable = [
        'date',
        'image',
        'title',
        'message',
        'status',
    ];
    
    public $timestamps = false;
}