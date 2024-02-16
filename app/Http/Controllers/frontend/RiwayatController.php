<?php

namespace App\Http\Controllers\frontend;

use App\Models\Jasa;
use App\Models\Produk;
use App\Models\JenisSeni;
use Illuminate\Http\Request;
use App\Models\PemesananJasa;
use App\Models\PemesananProduk;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{

    public function riwayat_pemesanan()
    {
        $jasa = PemesananJasa::where('status', 'proses')->get();
        $produk = PemesananProduk::where('status', 'proses')->get();

        // Menggabungkan dua koleksi menjadi satu
        $gabung = $jasa->merge($produk);

        $gabung = $gabung->sortByDesc('tanggal_pesan');

        return view('frontend.pages.riwayat.pemesanan', compact('gabung'));
    }

    public function search()
    {
        $jasa = Jasa::get()->toArray();
        $produk = Produk::get()->toArray();

        $gabung = array_merge($jasa, $produk);

        $data = [];

        foreach ($gabung as $item) {
            $nama = $item['nama'];
            // Cek apakah nama sudah ada di dalam array $data
            if (!in_array($nama, $data)) {
                // Jika belum ada, tambahkan nama ke dalam array $data
                $data[] = $nama;
            }
        }

        return $data;
    }


    public function search_action(Request $request)
    {
        $jasa = Jasa::where('nama', $request->nama)->get();
        $produk = Produk::where('nama', $request->nama)->get();
        $jenis_seni = JenisSeni::get();

        if ($jasa) {
            return view('frontend.pages.jasa.jasa-kesenian', compact('jasa','jenis_seni'));
        } else if($produk){
            return view('frontend.pages.produk.produk-kesenian', compact('produk','jenis_seni'));
        }else{
        Alert::error("Produk", "ini tidak ada");
            return redirect()->back();
        }
    }
}
