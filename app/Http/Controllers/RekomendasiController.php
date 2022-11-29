<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index()
    {
        //menuju halaman rekomendasi
        return view('rekomendasi');
    }

    public function store(Request $request)
    {
        $keluhan = $request->keluhan;
        $tahun = date('Y', strtotime($request->tahun));
        // dd($tahun);
    
        $rek = new Penggunaan($keluhan, $tahun);
        $umur = $rek->umur();
        $jamu = $rek->namaJamu();
        $saran = $rek->saran();
    
        $data = [
            'keluhannya' => $keluhan,
            'umurnya' => $umur,
            'jamunya' => $jamu,
            'sarannya' => $saran,
        ];
    
        return view('rekomendasi', compact('data'));
    }

}

class Jamu
{
    public function __construct($keluhan, $tahun)
    {
        $this->keluhan = $keluhan;
        $this->tahuns = $tahun;
        // dd($this->tahun);
    }

    public function umur(){
        $umur = date('Y')-$this->tahuns;
        return $umur;
    }
    
    public function namaJamu()
    {
        if($this->keluhan == 'keseleo' || $this->keluhan == 'kurang nafsu makan'){
            $jamu = 'Beras Kencur';
            return $jamu;
        }else if($this->keluhan=='pegal'){
            $jamu = 'Kunyit Asam';
            return $jamu;
        }else if($this->keluhan=='darah' || $this->keluhan == 'gula darah'){
            $jamu = 'Brotowali';
            return $jamu;
        }else if($this->keluhan=='keram' || $this->keluhan == 'masuk angin'){
            $jamu = 'Temulawak';
            return $jamu;
        }else{
            $jamu = 'Tidak ditemukan jamu';
            return $jamu;
        }
    }
}

class Penggunaan extends Jamu
{
    public function saran(){// method saran
        if($this->umur()<=10){
            $status = 'Dikonsumsi 1x';
        }else{
            $status = 'Dikonsumsi 2x';
        }

        if($this->namaJamu() == 'Beras Kencur' && $this->keluhan == 'keseleo'){
            $penggunaan = 'Dioleskan';
        }else{
            $penggunaan = 'Dikonsumsi';
        }

        return 'Pengkonsumsian : '. $status . ' & '. 'Penggunaan : '. $penggunaan;

    }
}