<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananJasa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
     protected $table = 'pemesanan_jasa';

     public function jasa()
     {
        return $this->belongsTo(Jasa::class);
     }

     public function pesan()
     {
         return $this->belongsTo(Pesan::class);
     }

}
