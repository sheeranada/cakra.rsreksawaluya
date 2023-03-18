<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Router;
use App\Models\Wifi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WifiController extends Controller
{
    public function index()
    {
        $wifi = Wifi::all();
        $area = Area::all();
        $router = Router::all();
        return view('wifi.index', compact(['wifi', 'area','router']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $wifi = Wifi::findorfail($id);
        $wifi->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $wifi = Wifi::findorfail($id);
        $wifi->area_id = $request->area_id;
        $wifi->router_id = $request->router_id;
        $wifi->ip_address = $request->ip_address;
        $wifi->dhcp = $request->dhcp;
        $wifi->ssid = $request->ssid;
        $wifi->password = $request->password;
        $wifi->save();
        return redirect()->back();

    }

    public function simpan(Request $request)
    {
        $wifi = new Wifi();
        $wifi->area_id = $request->area_id;
        $wifi->router_id = $request->router_id;
        $wifi->ip_address = $request->ip_address;
        $wifi->dhcp = $request->dhcp;
        $wifi->ssid = $request->ssid;
        $wifi->password = $request->password;
        $wifi->save();
        return redirect()->back();
    }
}
