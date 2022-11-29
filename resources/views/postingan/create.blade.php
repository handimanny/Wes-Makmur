@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Postingan/Buat') }}</div>

                <div class="card-body">
                    
                <form action="{{url('postingan')}}" method="POST" >
                    @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label @error('judul') is-invalid @enderror">Tambah Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Input Judul" >
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label @error('isi') is-invalid @enderror">Tambah Isi</label>
                    <!-- <input type="text" class="form-control" name="isi" id="isi" placeholder="Input Isi" > -->
                    <textarea name="isi" class="form-control" cols="30" rows="10" placeholder="Input Isi"></textarea>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggalDibuat" class="form-label @error('tanggalDibuat') is-invalid @enderror">Tambah Tanggal</label>
                    <input type="date" class="form-control" name="tanggalDibuat" id="tanggalDibuat" placeholder="Input Tanggal" >
                    @error('tanggalDibuat')
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
                <label for="user_id" class="form-label">Tambah User</label>
                <select class="form-control" id="user_id" name="user_id" enctype="multipart/form-data">
                <option selected>Open this select menu</option>
                    @foreach ($user as $file)
                    <option value="{{$file->id}}" @selected(old('user_id')==$file->id)>{{$file->name}}</option>
                    @endforeach
                </select>
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="mb-3">
                    <label for="status" class="form-label @error('status') is-invalid @enderror">Tambah Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="tampil">Tampil</option>
                        <option value="tidak">Tidak Tampil</option>
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
