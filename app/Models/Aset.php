<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Aset extends Model
{
    use HasFactory;
    protected $table = 'aset';
    protected $fillable = [
        'nama_aset',
        'id_kategori',
        'jumlah',
        'id_satuan',
        'harga',
        'tanggal_pengadaan',
        'lokasi',
        'jumlah_rusak'
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
