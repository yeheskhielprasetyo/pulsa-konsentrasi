<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $fillable = ['harga'];

    protected $table = 'hargas';

    public function harga()
    {
        return $this->hasMany(Operator::class, 'id_harga');
    }
}