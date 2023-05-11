<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $attributes = [
        'status' => 0
    ];

    public function armada()
    {
        return $this->belongsTo(Armada::class, 'armada_id');
    }
    public function supir()
    {
        return $this->belongsTo(Supir::class, 'supir_id');
    }
    public function bayar()
    {
        return $this->belongsTo(Bayar::class);
    }
}
