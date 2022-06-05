<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contoh extends Model
{
    use HasFactory;

    protected $fillable = ['nama','nim','kelas'];

    protected $table = 'contoh';
}
