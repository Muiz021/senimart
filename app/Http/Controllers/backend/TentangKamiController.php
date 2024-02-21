<?php

namespace App\Http\Controllers\backend;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentang_kami = TentangKami::get();
        return view('backend.pages.tentang-kami.index', compact('tentang_kami'));
    }
    public function create()
    {
        $tentang_kami = TentangKami::count();
        if ($tentang_kami == 1) {
            return redirect()->route('tentang-kami.index');
        } else {
            return view('backend.pages.tentang-kami.create');
        }
    }
    public function store(Request $request)
    {
        $tentang_kami = TentangKami::count();
        if ($tentang_kami == 1) {
            return redirect()->route('tentang-kami.index');
        } else {
            $data = $request->all();
            TentangKami::create($data);

            Alert::success('berhasil', 'menambah tentang kami');
            return redirect()->route('tentang-kami.index');
        }
    }

    public function update(Request $request, $id)
    {
        $tentang_kami = TentangKami::find($id);
        $data = $request->all();

        $tentang_kami->update($data);

        Alert::success('berhasil', 'memperbarui tentang kami');
        return redirect()->route('tentang-kami.index');
    }

    public function destroy($id)
    {
        $tentang_kami = TentangKami::find($id);
        $tentang_kami->delete();

        Alert::success('berhasil', 'menghapus tentang kami');
        return redirect()->route('tentang-kami.index');
    }
}
