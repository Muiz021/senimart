<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\PemesananProduk;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;

class PemesananProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan_produk = PemesananProduk::get();
        return view('backend.pages.pemesanan-produk.index', compact('pemesanan_produk'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesanan_produk = PemesananProduk::find($id);
        return view('backend.pages.pemesanan-produk.show', compact('pemesanan_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemesanan_produk = PemesananProduk::find($id);
        return view('backend.pages.pemesanan-produk.edit', compact('pemesanan_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemesanan_produk = PemesananProduk::find($id);
        $produk = Produk::find($pemesanan_produk->produk_id);

        $data = $request->all();

        if ($data['jumlah_produk'] < $produk->stok) {
            if ($data['status'] == 'selesai') {
                $produk->update([
                    'stok' => $produk->stok - $pemesanan_produk->jumlah_produk
                ]);
                $pemesanan_produk->update($data);
            } else {
                $pemesanan_produk->update($data);
            }
        } else {
            Alert::info("Info", "jumlah pesanan lebih banyak dari stok yang dimiliki");
            return redirect()->back();
        }

        Alert::success("Berhasil", "memperbarui data pemesanan produk");
        return redirect()->route('pemesanan-produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanan_produk = PemesananProduk::find($id);
        $pemesanan_produk->delete();

        Alert::success("Berhasil", "menghapus data pemesanan produk");
        return redirect()->route('pemesanan-produk.index');
    }
}
