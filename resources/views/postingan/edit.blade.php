@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Postingan/Edit') }}</div>

                <div class="card-body">
                
                <form action="{{url('postingan/'.$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label @error('judul') is-invalid @enderror">Edit Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Input Judul" value="{{$data->judul}}">
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label @error('isi') is-invalid @enderror">Edit Isi</label>
                    <!-- <input type="text" class="form-control" name="isi" id="isi" placeholder="Input Isi" value="{{$data->isi}}"> -->
                    <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" placeholder="Input Isi">{{$data->isi}}</textarea>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggalDibuat" class="form-label @error('tanggalDibuat') is-invalid @enderror">Edit Tanggal</label>
                    <input type="date" class="form-control" name="tanggalDibuat" id="tanggalDibuat" value="{{$data->tanggalDibuat}}">
                    @error('tanggalDibuat')
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
                <div class="mb-3">
                <label for="user_id" class="form-label">Edit Kategori</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option selected>Pilih kategori</option>
                    @foreach ($user as $file)
                    <option value="{{$file->id}}" @selected ( $data->user_id==$file->id )>{{$file->name}}</option>
                    @endforeach
                </select>
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="mb-3">
                <label for="status" class="form-label">Edit Status</label>
                <select class="form-control" id="status" name="status">
                    <option selected>Open this select menu</option>
                    <option value="tampil"  @selected($data->status=='tampil')>Tampil</option>
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
