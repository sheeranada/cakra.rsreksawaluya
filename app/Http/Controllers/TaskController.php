<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        $area = Area::all();
        return view('task.index', compact(['task', 'area']));
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $task = Task::findorfail($id);
        $task->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $task = Task::findorfail($id);
        $task->area_id = $request->area_id;
        $task->tanggal = $request->tanggal;
        $task->problem = $request->problem;
        $task->solving = $request->solving;
        $task->mulai = $request->mulai;
        $task->selesai = $request->selesai;
        $task->save();
        return redirect()->back();

    }

    public function simpan(Request $request)
    {
        $task = new Task();
        $task->area_id = $request->area_id;
        $task->tanggal = $request->tanggal;
        $task->problem = $request->problem;
        $task->solving = $request->solving;
        $task->mulai = $request->mulai;
        $task->selesai = $request->selesai;
        $task->save();
        return redirect()->back();
    }
}
