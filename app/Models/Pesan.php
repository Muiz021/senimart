<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'pesan';

    use HasFactory;

    public function pemesanan_jasa()
    {
        return $this->hasMany(PemesananJasa::class);
    }

    public function pemesanan_produk()
    {
        return $this->hasMany(PemesananProduk::class);
    }
}
