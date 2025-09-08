<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquires';
    
    protected $fillable = [
        'date',
        'name',
        'email',
        'subject',
        'phone',
        'message',
        'status'
    ];
    
    public $timestamps = false;
}