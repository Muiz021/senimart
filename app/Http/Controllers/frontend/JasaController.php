<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Jasa;
use Illuminate\Http\Request;
use App\Models\PemesananJasa;
use App\Http\Controllers\Controller;
use App\Models\JenisSeni;
use Illuminate\Support\Facades\Response;

class JasaController extends Controller
{
    public function jasa()
    {
        $jasa = Jasa::get();
        $jenis_seni = JenisSeni::get();
        return view('frontend.pages.jasa.jasa-kesenian', compact('jasa','jenis_seni'));
    }

    public function jasa_sort(Request $request)
    {
        $jasa = Jasa::where('seni_jenis_id',$request->jenis_seni_id)->get();
        // $jenis_seni = JenisSeni::get();

        return view('frontend.pages.jasa.menu-tari',compact('jasa'))->render();
        // return response()->json(['data'=>$jasa]);
    }

    public function pemesanan_jasa($id)
    {
        $jasa = Jasa::find($id);
        return view('frontend.pages.jasa.detail-pemesanan-jasa-kesenian', compact('jasa'));
    }

    public function kode_booking()
    {
        $latest_pemesananjasa = PemesananJasa::latest('kode_booking')->first();
        if ($latest_pemesananjasa) {
            $angkaData = intval(preg_replace('/[^0-9]/', '', $latest_pemesananjasa->kode_booking));
            $kode_booking = 'KBJ' . str_pad($angkaData + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $kode_booking = 'KBJ001';
        }

        return response()->json(['kode_booking' => $kode_booking], 200);
    }

    public function store_pemesanan_jasa(Request $request)
    {
        $data = $request->all();
        $data['tanggal_pesan'] = Carbon::now()->format('Y-m-d');

        $pemesanan_jasa = PemesananJasa::create($data);

        return redirect()->route('riwayat_jasa', $pemesanan_jasa->id);
    }

    public function update_pemesanan_jasa(Request $request, $id)
    {
        $pemesanan_jasa = PemesananJasa::find($id);

        $data = $request->all();
        $data['status'] = 'proses';

        $pemesanan_jasa->update($data);

        // mengirim pesan pada admin
        $tanggal_tampil = Carbon::parse($pemesanan_jasa->tanggal_tampil)->isoFormat('dddd, DD MMMM YYYY');
        $jam = Carbon::parse($pemesanan_jasa->jam)->isoFormat('HH:mm');
        $jasaNama = urlencode($pemesanan_jasa->jasa->nama);
        $tema = urlencode($pemesanan_jasa->tema);
        $lokasi = urlencode($pemesanan_jasa->lokasi);

        $url = "https://wa.me/+6281343671284?text=Saya%20ingin%20memesan%20jasa%20{$jasaNama}%20dengan%20tema%20{$tema}%20pada%20{$tanggal_tampil}%20jam%20{$jam}%20di%20tempat%20{$lokasi}";

        return redirect($url);
    }

    public function riwayat_jasa($id)
    {
        $jasa = PemesananJasa::find($id);
        return view('frontend.pages.jasa.detail-riwayat-pemesanan-jasa', compact('jasa'));
    }
}
