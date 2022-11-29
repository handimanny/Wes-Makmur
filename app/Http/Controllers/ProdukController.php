<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilan semua produk
        $data = Produk::all();
        $kategori = Kategori::all();
        return view('/produk/produk', compact('data','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ke form buat produk baru
        $data = Produk::all();
        $kategori = Kategori::all();
        return view('/produk/create', compact('data','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah data produk
        // dd($request);
        $validator = $request->validate([
            'namaProduk' => 'required|string',
            'foto' => 'required|image',
            'harga' => 'required|string',
            'descProduk' => 'required|string',
            'kategori_id' => 'required|string',
            'status' => 'required|string',
          ]);
          $validator['foto'] = $request->file('foto')->store('img');
          Produk::create($validator);
          return redirect('/produk')->with('success', 'berhasil tambah produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menuju form edit
        $data = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk/edit', compact('data','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //edit data produk
        $data = Produk::findOrFail($id);
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('img');
            if ($request->foto){
                Storage::delete($data->foto);
            }
            $data->update([
                'namaProduk' => $request->namaProduk,
                'foto' => $file,
                'harga' => $request->harga,
                'descProduk' => $request->descProduk,
                'kategori_id' => $request->kategori_id,
                'status' => $request->status,
            ]);
        } else {
            $data->update([
                'namaProduk' => $request->namaProduk,
                'foto' => $data->foto,
                'harga' => $request->harga,
                'descProduk' => $request->descProduk,
                'kategori_id' => $request->kategori_id,
                'status' => $request->status,
            ]);
        }
        return redirect('/produk')->with('success', 'berhasil edit produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus produk
        $data = Produk::findOrFail($id);
        if($data->foto){
            Storage::delete($data->foto);
        }
        $data->delete();
        return redirect('/produk')->with('error', 'berhasil hapus produk');
    }
}
