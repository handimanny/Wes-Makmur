<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $data = Postingan::where('status', 'tampil')->get();
        return view('home', compact('data'));
        // if (Auth::user()->role == 'admin'){
        //     return view('home');
        // }else
        // if (Auth::user()->role == 'editor'){
        //     return redirect ('home');
        // }else
        // if (Auth::user()->role == 'user'){
        //     return redirect ('home');
        // }
    }
    
    public function halaman($id)
    {
        $data = Postingan::findOrFail($id);
        $kategori = Kategori::all();
        $user = User::all();
        $produk = Produk::where('status', 'tampil')->get();
        return view('halaman', compact('data','kategori','user','produk'));
    }
}
