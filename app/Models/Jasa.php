<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pemesanan_jasa()
    {
       return $this->hasOne(PemesananJasa::class);
    }

    public function seni_jenis()
    {
        return $this->belongsTo(JenisSeni::class);
    }
}
