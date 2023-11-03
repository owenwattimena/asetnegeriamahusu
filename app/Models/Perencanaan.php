<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Perencanaan extends Model
{
    use HasFactory;
    protected $table = "perencanaan_aset";

    protected $fillable = [
        'nama_aset',
        'id_kategori',
        'jumlah',
        'id_satuan',
        'harga',
    ];

    /**
     * Get the kategori associated with the Perencanaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kategori(): HasOne
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }

    /**
     * Get the satuan associated with the Perencanaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function satuan(): HasOne
    {
        return $this->hasOne(Satuan::class, 'id', 'id_satuan');
    }
}
