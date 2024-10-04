<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'type'];

    protected $casts = [
        'data' => 'array', // تحويل عمود 'data' إلى مصفوفة
    ];
}
