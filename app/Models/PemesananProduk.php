<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananProduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pemesanan_produk';

    public function produk()
    {
       return $this->belongsTo(Produk::class);
    }

    public function pesan()
    {
        return $this->belongsTo(Pesan::class);
    }
}
