<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Obat;
use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{

    public function index()
    {
        //
        $obat = Obat::with('Jenis')->get();
        $jenisobat = Jenis::get();
        return view('Supplier.index',['obat' => $obat,'jenisobat' => $jenisobat]);
    }

    public function cariobat(Request $request){
        $obat = Obat::where('obat_nama',$request->obat_nama)->orWhere('jenis_id',$request->jenis_id)->get();
        $jenisobat = Jenis::get();

        return view('Supplier.cariobat',['obat' => $obat,'jenisobat' => $jenisobat]);
    }
}
