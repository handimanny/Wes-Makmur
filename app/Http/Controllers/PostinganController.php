<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Postingan::all();
        return view('/postingan/postingan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ke form buat postingan baru
        $data = Postingan::all();
        $kategori = Kategori::all();
        $user = User::all();
        return view('/postingan/create', compact('data','kategori', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'tanggalDibuat' => 'required|string',
            'kategori_id' => 'required|string',
            'user_id' => 'required|string',
            'status' => 'required|string',
            ]);
            Postingan::create($validator);
            return redirect('/postingan')->with('success', 'berhasil tambah postingan');
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
        // menuju form edit
        $data = Postingan::findOrFail($id);
        $kategori = Kategori::all();
        $user = User::all();
        return view('/postingan/edit', compact('data','kategori', 'user'));
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
        //edit postingan
        $data = Postingan::findOrFail($id);
        $validator = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'tanggalDibuat' => 'required|string',
            'kategori_id' => 'required|string',
            'user_id' => 'required|string',
            'status' => 'required|string',
        ]);
        $data->update($validator);
        return redirect('/postingan')->with('success', 'berhasil edit postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus postingan
        $data = Postingan::findOrFail($id);
        $data->delete();
        return redirect('/postingan')->with('error', 'berhasil hapus postingan');
    }
}
