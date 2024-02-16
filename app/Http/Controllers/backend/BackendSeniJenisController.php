<?php

namespace App\Http\Controllers\backend;

use App\Models\JenisSeni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BackendSeniJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_seni = JenisSeni::get();
        return view('backend.pages.seni-jenis.index', compact('jenis_seni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_seni = JenisSeni::count();

        if ($jenis_seni == 3) {
            return redirect()->route('jenis-seni.index');
        } else {
            return view('backend.pages.seni-jenis.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jenis_seni = JenisSeni::count();

        if ($jenis_seni == 3) {
            return redirect()->route('jenis-seni.index');
        } else {
            $data = $request->all();
            JenisSeni::create($data);

            Alert::success("Berhasil", "membuat data jenis seni");
            return redirect()->route('jenis-seni.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis_seni = JenisSeni::find($id);
        return view('backend.pages.seni-jenis.show', compact('jenis_seni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis_seni = JenisSeni::find($id);
        return view('backend.pages.seni-jenis.edit', compact('jenis_seni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis_seni = JenisSeni::find($id);
        $data = $request->all();

        $jenis_seni->update($data);

        Alert::success("Berhasil", "memperbarui data jenis seni");
        return redirect()->route('jenis-seni.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis_seni = JenisSeni::find($id);
        $jenis_seni->delete();

        Alert::success("Berhasil", "menghapus data jenis seni");
        return redirect()->route('jenis-seni.index');
    }
}
