<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EmailController extends Controller
{
    public function index()
    {
        $email = Email::all();
        return view('email.index',compact(['email']));
    }
    public function simpan(Request $request)
    {
        $email = new Email();
        $email->email = $request->email;
        $email->password = $request->password;
        $email->save();
        return redirect()->back();
    }
    public function hapus($id)
    {
        $id = Crypt::decrypt($id);
        $email = Email::findorfail($id);
        $email->delete();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $email = Email::findorfail($id);
        $email->email = $request->email;
        $email->password = $request->password;
        $email->save();
        return redirect()->back();

    }
}
