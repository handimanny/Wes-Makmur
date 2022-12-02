@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produk/Edit') }}</div>

                <div class="card-body">
                
                <form action="{{url('produk/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="namaProduk" class="form-label @error('namaProduk') is-invalid @enderror">Edit Nama</label>
                    <input type="text" class="form-control" name="namaProduk" id="namaProduk" placeholder="Input Nama" value="{{$data->namaProduk}}">
                    @error('namaProduk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Edit Foto</label>
                    @if($data->foto)
                    <img src="{{ asset('storage/'.$data->foto) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    @endif
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label @error('harga') is-invalid @enderror">Edit Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Input Harga" value="{{$data->harga}}">
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descProduk" class="form-label @error('descProduk') is-invalid @enderror">Edit Deskripsi</label>
                    <input type="text" class="form-control" name="descProduk" id="descProduk" placeholder="Input Deskripsi" value="{{$data->descProduk}}">
                    @error('descProduk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                <label for="kategori_id" class="form-label">Edit Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option selected>Pilih kategori</option>
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected ( $data->kategori_id==$file->id )>{{$file->namaKategori}}</option>
                    @endforeach
                </select>
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="mb-3">
                <label for="status" class="form-label">Edit Status</label>
                <select class="form-control" id="status" name="status">
                    <option selected value="tampil"  @selected($data->status=='tampil')>Tampil</option>
                    <option value="tidak"  @selected($data->status=='tidak')>Tidak Tampil</option>
                </select>
                </div>
                @endif
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
