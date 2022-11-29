@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kategori/Edit') }}</div>

                <div class="card-body">
                
                <form action="{{url('kategori/'.$data->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="namaKategori" class="form-label">Edit Nama</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Input Nama" value="{{$data->namaKategori}}" >
                </div>
                <div class="mb-3">
                    <label for="descKategori" class="form-label">Edit Deskripsi</label>
                    <input type="text" class="form-control" id="descKategori" name="descKategori" placeholder="Input Deskripsi" value="{{$data->descKategori}}" >
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
