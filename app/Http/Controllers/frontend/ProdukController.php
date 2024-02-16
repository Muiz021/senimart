<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\PemesananProduk;
use App\Http\Controllers\Controller;
use App\Models\JenisSeni;
use Illuminate\Support\Facades\Response;

class ProdukController extends Controller
{
    public function produk()
    {
        $produk = Produk::get();
        $jenis_seni = JenisSeni::get();
        return view('frontend.pages.produk.produk-kesenian', compact('produk','jenis_seni'));
    }

    public function produk_sort(Request $request)
    {
        $produk = Produk::where('seni_jenis_id',$request->jenis_seni_id)->get();

        return view('frontend.pages.produk.menu-produk',compact('produk'))->render();
    }

    public function detail_produk($id)
    {
        $produk = Produk::find($id);
        return view('frontend.pages.produk.detail-produk-kesenian', compact('produk'));
    }

    public function pemesanan_produk($id)
    {
        $produk = Produk::find($id);
        return view('frontend.pages.produk.detail-pemesanan-produk-kesenian', compact('produk'));
    }

    public function kode_booking()
    {
        $latest_pemesananproduk = PemesananProduk::latest('kode_booking')->first();
        if ($latest_pemesananproduk) {
            $angkaData = intval(preg_replace('/[^0-9]/', '', $latest_pemesananproduk->kode_booking));
            $kode_booking = 'KBP' . str_pad($angkaData + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $kode_booking = 'KBP001';
        }

        return response()->json(['kode_booking' => $kode_booking], 200);
    }
    public function store_pemesanan_produk(Request $request)
    {
        $data = $request->all();
        $pemesanan_produk = PemesananProduk::create($data);

        return redirect()->route('riwayat_produk', $pemesanan_produk->id);
    }

    public function update_pemesanan_produk(Request $request, $id)
    {
        $pemesanan_produk = PemesananProduk::find($id);

        $data = $request->all();
        $data['status'] = 'proses';
        $pemesanan_produk->update($data);

        // mengirim pesan pada admin
        $tanggal_pesan = Carbon::parse($pemesanan_produk->tanggal_pesan)->isoFormat('dddd, DD MMMM YYYY');
        $produkNama = urlencode($pemesanan_produk->produk->nama);
        $jumlahProduk = urlencode($pemesanan_produk->jumlah_produk);

        $url = "https://wa.me/+6281343671284?text=Saya%20ingin%20memesan%20produk%20{$produkNama}%20pada%20{$tanggal_pesan}%20sejumlah%20{$jumlahProduk}";

        return redirect($url);
    }

    public function riwayat_produk($id)
    {
        $produk = PemesananProduk::find($id);
        return view('frontend.pages.produk.detail-riwayat-pemesanan-produk', compact('produk'));
    }
}
