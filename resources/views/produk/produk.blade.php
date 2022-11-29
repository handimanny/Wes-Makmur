@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produk') }}</div>

                <div class="card-body">
                <a href="produk/create" class="btn btn-outline-primary" >Tambah Produk</a>
                      <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Foto</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Status</th>
                              <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $file)
                              <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$file['namaProduk']}}</td>
                              <td>
                                <img src="{{ asset('storage/'.$file->foto) }}" width="100px" alt="">
                              </td>
                              <td>{{$file['harga']}}</td>
                              <td>{{$file['descProduk']}}</td>
                              <td>{{$file->kategori->namaKategori}}</td>
                              <td>{{$file['status']}}</td>
                              <td>
                              <a href="{{url('produk/'.$file->id.'/edit')}}" class="btn btn-outline-success" >Edit</a>
                              |
                              <a href="{{url('deleteproduk/'.$file->id)}}" class="btn btn-outline-danger" >Hapus</a>
                              </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
