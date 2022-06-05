<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['id_transaksi_pulsa', 'status'];

    protected $table = 'pelanggans';

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi_pulsa');
    }
}