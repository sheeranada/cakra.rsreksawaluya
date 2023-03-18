<?php

namespace App\Http\Controllers;

use App\Models\Pma;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PmaController extends Controller
{
    public function index()
    {
        $pma = Pma::all();
        $server = Server::all();
        return view('pma.index', compact(['pma','server']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $pma = Pma::findorfail($id);
        $pma->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $pma = Pma::findorfail($id);
        $pma->server_id = $request->server_id;
        $pma->user_login = $request->user_login;
        $pma->password = $request->password;
        $pma->save();
        return redirect()->back();
        // dd($request);

    }

    public function simpan(Request $request)
    {
        $pma = new Pma();
        $pma->server_id = $request->server_id;
        $pma->user_login = $request->user_login;
        $pma->password = $request->password;
        $pma->save();
        return redirect()->back();
    }
}
