<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::all();
        $unit = Unit::all();
        return view('area.index', compact(['area','unit']));
    }
    public function hapus_area($id)
    {
        $id = Crypt::decrypt($id);
        $area = Area::findorfail($id);
        $area->delete();
        return redirect()->back();
    }
    public function update_area(Request $request, $id)
    {
        $area = Area::findorfail($id);
        $area->unit_id = $request->unit_id;
        $area->nama_area = $request->nama_area;
        $area->save();
        return redirect()->back();
        // dd($request);

    }

    public function simpan_area(Request $request)
    {
        $area = new area();
        $area->unit_id = $request->unit_id;
        $area->nama_area = $request->nama_area;
        $area->save();
        return redirect()->back();
    }
}
