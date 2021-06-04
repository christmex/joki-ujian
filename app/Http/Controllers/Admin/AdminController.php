<?php

namespace App\Http\Controllers\Admin;

use App\Models\Obat;
use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {
        //
        $obat = Obat::with('Jenis')->get();
        $jenisobat = Jenis::get();
        return view('Admin.index',['obat' => $obat,'jenisobat' => $jenisobat]);
    }

    public function simpan(Request $request)
    {
        //
        Obat::create($request->all());
        return redirect('/admin')->with('pesan','Berhasil Menambahkan Data');
    }

    public function hapus(Request $request)
    {
        //
        Obat::destroy($request->id);
        return redirect('/admin')->with('pesan','Berhasil Menghapus Data');
    }
}
