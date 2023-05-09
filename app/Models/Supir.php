<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $attributes = [
        'status' => 'Tersedia'
    ];
}
