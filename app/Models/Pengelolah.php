<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelolah extends Model
{
    use HasFactory;
    protected $table = 'pengelolah';
    protected $fillable = [
        'nama',
        'jabatan',
        'alamat',
        'no_telp',
    ];
}
