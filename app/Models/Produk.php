<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $nullable = ['status'];
    protected $table = 'produks'; //for relasi

    public function kategori() //for relasi
    {
        return $this->belongsTo(Kategori::class); //for relasi
    }
}
