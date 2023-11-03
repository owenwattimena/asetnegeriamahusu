<?php

namespace App\Models;

use App\Models\Aset;
use App\Models\Pengelolah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengelolahan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "pengelolahan";
    protected $fillable = [
        'id_aset',
        'id_pengelolah',
        'tanggal_mulai_kelolah',
        'tanggal_selesai_kelolah'
    ];

    /**
     * Get the aset associated with the Pengelolahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aset(): HasOne
    {
        return $this->hasOne(Aset::class, 'id', 'id_aset');
    }

    /**
     * Get the aset associated with the Pengelolahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pengelolah(): HasOne
    {
        return $this->hasOne(Pengelolah::class, 'id', 'id_pengelolah');
    }
}
