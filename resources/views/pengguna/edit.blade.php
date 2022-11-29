@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengguna/Edit') }}</div>

                <div class="card-body">
                
                <form action="{{url('pengguna/'.$data->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Edit Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Input Name" value="{{$data->name}}" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Edit Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Input Email" value="{{$data->email}}" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Edit password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Input password" value="{{$data->password}}" >
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="mb-3">
                    <label class="form-label">Edit Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected>Open this select menu</option>
                        <option value="admin" @selected($data->role=='admin')>Admin</option>
                        <option value="editor" @selected($data->role=='editor')>Editor</option>
                        <option value="user" @selected($data->role=='user')>User</option>
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
