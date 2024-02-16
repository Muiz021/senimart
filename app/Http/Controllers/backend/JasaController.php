<?php

namespace App\Http\Controllers\backend;

use App\Models\JenisSeni;
use Carbon\Carbon;
use App\Models\Jasa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasa = Jasa::get();
        return view('backend.pages.jasa.index', compact('jasa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_seni = JenisSeni::get();
        return view('backend.pages.jasa.create', compact('jenis_seni'));
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

        Jasa::create($data);

        Alert::success("Berhasil", "membuat data jasa");
        return redirect()->route('jasa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jasa $jasa)
    {
        $jenis_seni = JenisSeni::get();
        return view('backend.pages.jasa.show', compact('jasa', 'jenis_seni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jasa $jasa)
    {
        $jenis_seni = JenisSeni::get();
        return view('backend.pages.jasa.edit', compact('jasa', 'jenis_seni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jasa $jasa)
    {
        $data = $request->all();

        if ($request->gambar) {
            $baseURL = url('/');
            $file_path = Str::replace($baseURL . '/images/', '', public_path() . '/images/' . $jasa->gambar);
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

        $jasa->update($data);

        Alert::success("Berhasil", "memperbarui data jasa");
        return redirect()->route('jasa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa)
    {
        $baseURL = url('/');
        $file_path = Str::replace($baseURL . '/images/', '', public_path('/images/' . $jasa->gambar));

        if ($jasa->gambar != null) {
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $jasa->delete();

        Alert::success("Berhasil", "menghapus data jasa");
        return redirect()->route('jasa.index');
    }
}
