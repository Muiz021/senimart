<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSeni extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'seni_jenis';

    public function jasa()
    {
        return $this->hasOne(Jasa::class);
    }

    public function produk()
    {
        return $this->hasOne(Produk::class);
    }
}
