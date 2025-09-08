<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'email';
    
    protected $fillable = [
        'date',
        'email',
        'email_protocol',
        'email_host',
        'email_username',
        'email_password',
        'email_port',
        'edit',
        'editvalue',
        'active',
        'activevalue',
        'status'
    ];
    
    public $timestamps = false;
}