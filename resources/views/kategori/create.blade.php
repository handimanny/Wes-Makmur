@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kategori/Buat') }}</div>

                <div class="card-body">
                <form action="{{url('kategori')}}" method="POST" >
                    @csrf
                <div class="mb-3">
                    <label for="namaKategori" class="form-label @error('namaKategori') is-invalid @enderror">Tambah Nama</label>
                    <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="Input Nama" >
                    @error('namaKategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descKategori" class="form-label @error('descKategori') is-invalid @enderror">Tambah Deskripsi</label>
                    <input type="text" class="form-control" name="descKategori" id="descKategori" placeholder="Input Deskripsi" >
                    @error('descKategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
