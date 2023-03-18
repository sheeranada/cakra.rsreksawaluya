<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        return view('unit.index', compact(['unit']));
    }
    public function hapus_unit($id)
    {
        $id = Crypt::decrypt($id);
        $unit = Unit::findorfail($id);
        $unit->delete();
        return redirect()->back();
    }
    public function update_unit(Request $request, $id)
    {
        $unit = Unit::findorfail($id);
        $unit->nama_unit = $request->nama_unit;
        $unit->save();
        return redirect()->back();
        // dd($request);

    }

    public function simpan_unit(Request $request)
    {
        $unit = new Unit();
        $unit->nama_unit = $request->nama_unit;
        $unit->save();
        return redirect()->back();
    }
}
