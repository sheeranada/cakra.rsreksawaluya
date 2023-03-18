<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AplikasiController extends Controller
{
    public function index()
    {
        $aplikasi = Aplikasi::all();
        return view('aplikasi.index', compact(['aplikasi']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $aplikasi = Aplikasi::findorfail($id);
        $aplikasi->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $aplikasi = Aplikasi::findorfail($id);
        $aplikasi->nama_aplikasi = $request->nama_aplikasi;
        $aplikasi->url = $request->url;
        $aplikasi->user_login = $request->user_login;
        $aplikasi->password = $request->password;
        $aplikasi->save();
        return redirect()->back();

    }

    public function simpan(Request $request)
    {
        $aplikasi = new Aplikasi();
        $aplikasi->nama_aplikasi = $request->nama_aplikasi;
        $aplikasi->url = $request->url;
        $aplikasi->user_login = $request->user_login;
        $aplikasi->password = $request->password;
        $aplikasi->save();
        return redirect()->back();
    }

}
