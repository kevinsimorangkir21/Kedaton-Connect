@extends('layouts.user_type.auth')

@section('content')

  <div class="container-fluid py-4">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Users</h4>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card-body">
                                <!-- Display validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <form action="{{ route('insertuser') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="mb-0">Nama</h6>
                                        <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Email</h6>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ old('email') }}">
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Password</h6>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="exampleInputRole" class="form-label">Role</label>
                                        <select class="form-select form-select-sm" name="role" aria-label="form-select-sm example">
                                            <option selected>Pilih Role</option>
                                            <option value="1">manager</option>
                                            <option value="2">user</option>
                                        </select>
                                    </div> --}}
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
