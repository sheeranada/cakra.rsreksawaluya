<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServerController extends Controller
{
    public function index()
    {
        $server = Server::all();
        return view('server.index', compact(['server']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $server = Server::findorfail($id);
        $server->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $server = Server::findorfail($id);
        $server->nama_server = $request->nama_server;
        $server->ip_address = $request->ip_address;
        $server->user_login = $request->user_login;
        $server->password = $request->password;
        $server->save();
        return redirect()->back();

    }

    public function simpan(Request $request)
    {
        $server = new server();
        $server->nama_server = $request->nama_server;
        $server->ip_address = $request->ip_address;
        $server->user_login = $request->user_login;
        $server->password = $request->password;
        $server->save();
        return redirect()->back();
    }
}
