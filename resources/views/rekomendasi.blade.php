@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rekomendasi') }}</div>

                <div class="card-body">
                    
                <form action="{{url('rekomendasi')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <div class="col pe-1">
                                <label>Keluhan :</label>
                                <select name="keluhan" class="form-control" autofocus>
                                    <option value="">Pilih keluhan</option>
                                    <option value="Keseleo dan kurang nafsu makan">Keseleo dan kurang nafsu makan</option>
                                    <option value="Pegal-pegal">Pegal-pegal</option>
                                    <option value="Darah tinggi dan gula darah">Darah tinggi dan gula darah</option>
                                    <option value="Kram perut dan masuk angin">Kram perut dan masuk angin</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Tahun Lahir :</label>
                                <input class="form-control" type="date" name="tahun" >
                            </div>
                        </div>
                        <div class="mt-3" >
                            <input type="submit" class="btn btn-primary" value="Lihat">
                            <a href="rekomendasi" class="btn btn-warning text-white">Input Ulang</a>
                        </div>
                    </form>
                    <div>
                        @isset($data)    
                        <h3>Rekomendasi</h3>                        
                        <table class="table table-hover">
                            <tr>
                                <th>Nama Jamu</th>
                                <td>{{$data['jamunya']}}</td>
                            </tr>
                            <tr>
                                <th>Khasiat</th>
                                <td>{{$data['khasiatnya']}}</td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td>{{$data['keluhannya']}}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{$data['umurnya']}}</td>
                            </tr>
                            <tr>
                                <th>Penggunaan</th>
                                <td>{{$data['sarannya']}}</td>
                            </tr>
                        </table>
                        @endisset
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
