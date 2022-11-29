@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produk/Buat') }}</div>

                <div class="card-body">
                <form action="{{url('produk')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="namaProduk" class="form-label @error('namaProduk') is-invalid @enderror">Tambah Produk</label>
                    <input type="text" class="form-control" name="namaProduk" id="namaProduk" placeholder="Input Produk" >
                    @error('namaProduk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Tambah Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label @error('harga') is-invalid @enderror">Tambah Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Input Harga" >
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descProduk" class="form-label @error('descProduk') is-invalid @enderror">Tambah Deskripsi</label>
                    <input type="text" class="form-control" name="descProduk" id="descProduk" placeholder="Input Produk" >
                    @error('descProduk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                <label for="kategori_id" class="form-label">Tambah Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" enctype="multipart/form-data">
                <option selected>Open this select menu</option>
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected(old('kategori_id')==$file->id)>{{$file->namaKategori}}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label @error('status') is-invalid @enderror">Tambah Status</label>
                    <select name="status" id="status" class="form-control">
                        <option>Pilih Status</option>
                        <option value="tidak">Tidak Tampil</option>
                        <option value="tampil">Tampil</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
