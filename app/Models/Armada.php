<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $attributes = [
        'mobilImages' => ''
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
