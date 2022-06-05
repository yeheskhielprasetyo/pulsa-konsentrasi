<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = ['nama_operator', 'stock', 'id_harga'];

    protected $table = 'operators';

    public function harga()
    {
        return $this->belongsTo(Harga::class, 'id_harga');
    }
}