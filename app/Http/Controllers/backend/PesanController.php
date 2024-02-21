<?php

namespace App\Http\Controllers\backend;

use App\Models\Pesan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::get();
        return view('backend.pages.pesan.index', compact('pesan'));
    }
    public function create()
    {
        $pesan = Pesan::get();
        if ($pesan->count() == 2) {
            return redirect()->route('pesan.index');
        } else {
            return view('backend.pages.pesan.create', compact('pesan'));
        }
    }
    public function store(Request $request)
    {
        $pesan = Pesan::get();

        if ($pesan->count() == 2) {
            return redirect()->route('pesan.index');
        } else {
            $data = $request->all();
            $data['deskripsi'] = Str::slug($request->deskripsi, '%20');
            Pesan::create($data);

            Alert::success('berhasil', 'menambah pesan');
            return redirect()->route('pesan.index');
        }
    }

    public function update(Request $request, $id)
    {
        $pesan = Pesan::find($id);
        $data = $request->all();
        $data['deskripsi'] = Str::slug($request->deskripsi, '%20');

        $pesan->update($data);

        Alert::success('berhasil', 'memperbarui pesan');
        return redirect()->route('pesan.index');
    }

    public function destroy($id)
    {
        $pesan = Pesan::find($id);
        $pesan->delete();

        Alert::success('berhasil', 'menghapus pesan');
        return redirect()->route('pesan.index');
    }
}
