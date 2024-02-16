<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\PemesananJasa;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PemesananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan_jasa = PemesananJasa::get();
        return view('backend.pages.pemesanan-jasa.index',compact('pemesanan_jasa'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemesanan_jasa = PemesananJasa::find($id);
        return view('backend.pages.pemesanan-jasa.show',compact('pemesanan_jasa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemesanan_jasa = PemesananJasa::find($id);
        return view('backend.pages.pemesanan-jasa.edit',compact('pemesanan_jasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemesanan_jasa = PemesananJasa::find($id);

        $data = $request->all();
        $pemesanan_jasa->update($data);

        Alert::success("Berhasil", "memperbarui data pemesanan jasa");
        return redirect()->route('pemesanan-jasa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanan_jasa = PemesananJasa::find($id);
        $pemesanan_jasa->delete();

        Alert::success("Berhasil", "menghapus data pemesanan jasa");
        return redirect()->route('pemesanan-jasa.index');
    }
}
