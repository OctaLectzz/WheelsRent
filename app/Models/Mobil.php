<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $attributes = [
        'status' => 0
    ];
}
