<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productnew extends Model
{
    use HasFactory;

    protected $table = 'productnew';
    protected $fillable = [
        "date",
        "category",
        "product_name",
        "specification",
        "video_url",
        "information",
        "features",
        "application",
        "product_image",
        "status",
    ];

    public $timestamps = true;

}
