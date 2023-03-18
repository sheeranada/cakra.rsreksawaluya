<?php

namespace App\Http\Controllers;

use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RouterController extends Controller
{
    public function index()
    {
        $router = Router::all();
        return view('router.index', compact(['router']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $router = Router::findorfail($id);
        $router->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $router = Router::findorfail($id);
        $router->nama_router = $request->nama_router;
        $router->ip_address = $request->ip_address;
        $router->user_login = $request->user_login;
        $router->password = $request->password;
        $router->ssid_default = $request->ssid_default;
        $router->ssid_password = $request->ssid_password;
        $router->save();
        return redirect()->back();

    }

    public function simpan(Request $request)
    {
        $router = new router();
        $router->nama_router = $request->nama_router;
        $router->ip_address = $request->ip_address;
        $router->user_login = $request->user_login;
        $router->password = $request->password;
        $router->ssid_default = $request->ssid_default;
        $router->ssid_password = $request->ssid_password;
        $router->save();
        return redirect()->back();
    }
}
