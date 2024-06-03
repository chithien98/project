<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'blog_rate';
    protected $fillable = [
        'rate',
        'id_blog',
        'id_user'
    ];
}
