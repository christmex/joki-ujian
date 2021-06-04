<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function login(Request $request)
    {
        return view('site.login');
    }

    public function doLogin(Request $request)
    {
        if($request->supplier_username == 'admin' && $request->supplier_password == 'admin'){
            $request->session()->put('yglogin', $request->all()); // daftarkan ke session
            
            return redirect('/admin');
        }else {
            $yglogin = Supplier::where('supplier_username',$request->supplier_username)
                            ->where('supplier_password',$request->supplier_password)
                            ->first();
            if($yglogin !== null){
                $request->session()->put('yglogin', $yglogin); // daftarkan ke session
    
                return redirect('/supplier');
            }else{
                // gagal login
                return redirect('/')->with('pesan','Username/Password Anda Salah');
            }
        }
    }

    public function doLogout(Request $request)
    {
        $request->session()->forget('yglogin');
        return redirect('/');
    }

    public function register(Request $request)
    {
        return view('site.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'supplier_nama' => 'required',
            'supplier_username' => 'required|unique:App\Models\Supplier,supplier_username',
            'supplier_password'=> 'required|confirmed'
        ]);

        if(Supplier::create($request->all())){
            //register berhasil
            return redirect('/')->with('pesan','Berhasil Register Silahkan Login');
        }else{
            return redirect('/register')->with('pesan','Gagal Register');
        }
    }
}
