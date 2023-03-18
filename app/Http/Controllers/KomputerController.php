<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Komputer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KomputerController extends Controller
{
    public function index()
    {
        $komputer = Komputer::all();
        $area = Area::all();
        return view('komputer.index', compact(['komputer', 'area']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $komputer = Komputer::findorfail($id);
        $komputer->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $komputer = Komputer::findorfail($id);
        $komputer->area_id = $request->area_id;
        $komputer->nama_komputer = $request->nama_komputer;
        $komputer->jenis = $request->jenis;
        $komputer->ip_address = $request->ip_address;
        $komputer->user_login = $request->user_login;
        $komputer->password = $request->password;
        $komputer->prosesor = $request->prosesor;
        $komputer->ram = $request->ram;
        $komputer->mobo = $request->mobo;
        $komputer->os = $request->os;
        $komputer->save();
        return redirect()->back();

    }

    public function simpan(Request $request)
    {
        $komputer = new Komputer();
        $komputer->area_id = $request->area_id;
        $komputer->nama_komputer = $request->nama_komputer;
        $komputer->jenis = $request->jenis;
        $komputer->ip_address = $request->ip_address;
        $komputer->user_login = $request->user_login;
        $komputer->password = $request->password;
        $komputer->prosesor = $request->prosesor;
        $komputer->ram = $request->ram;
        $komputer->mobo = $request->mobo;
        $komputer->os = $request->os;
        $komputer->save();
        return redirect()->back();
    }
}
