<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\JenisSeni;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::get();
        return view('backend.pages.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_seni = JenisSeni::get();
        return view('backend.pages.produk.create',compact('jenis_seni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $gambar = $request->file('gambar');
        $destinationPath = 'images/';
        $baseURL = url('/');
        $namaGambar = $baseURL . '/images/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
        $gambar->move($destinationPath, $namaGambar);
        $data['gambar'] = $namaGambar;

        Produk::create($data);

        Alert::success("Berhasil", "membuat data produk");
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('backend.pages.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $jenis_seni = JenisSeni::get();
        return view('backend.pages.produk.edit', compact('produk','jenis_seni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->all();

        if ($request->gambar) {
            $baseURL = url('/');
            $file_path = Str::replace($baseURL . '/images/', '', public_path('/images/' . $produk->gambar));
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $gambar = $request->file('gambar');
            $destinationPath = 'images/';
            $baseURL = url('/');
            $namaGambar = $baseURL . '/images/' . Str::slug($request->nama) . '-' . Carbon::now()->format('YmdHis')  . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $produk->update($data);

        Alert::success("Berhasil", "memperbarui data produk");
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $baseURL = url('/');
        if ($produk->gambar != null) {
            $file_path = Str::replace($baseURL . '/images/', '', public_path('/images/' . $produk->gambar));
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $produk->delete();

        Alert::success("Berhasil", "menghapus data produk");
        return redirect()->route('produk.index');
    }
}
