<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategoris'; //for relasi
    
    public function produk() //for relasi
    {
        return $this->hasMany(Produk::class); //for relasi
    }
    public function postingan() //for relasi
    {
        return $this->hasMany(Postingan::class); //for relasi
    }
}
