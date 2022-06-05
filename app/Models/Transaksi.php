<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_operator', 'jumlah', 'no_hp', 'total_harga', 'gambar'];

    protected $table = 'transaksis';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'id_operator');
    }

    public function transaksi()
    {
        return $this->hasMany(Pelanggan::class, 'id_transaksi_pulsa');
    }
}